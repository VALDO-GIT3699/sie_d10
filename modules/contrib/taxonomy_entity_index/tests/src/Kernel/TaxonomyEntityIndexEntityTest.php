<?php

namespace Drupal\Tests\taxonomy_entity_index\Kernel;

use Drupal\entity_test\Entity\EntityTest;
use Drupal\taxonomy\TermInterface;
use Drupal\Tests\node\Traits\ContentTypeCreationTrait;
use Drupal\Tests\node\Traits\NodeCreationTrait;

/**
 * Defines a class for testing basic functionality of taxonomy_entity_index.
 *
 * @group taxonomy_entity_index
 */
class TaxonomyEntityIndexEntityTest extends TaxonomyEntityIndexKernelTestBase {

  use ContentTypeCreationTrait;
  use NodeCreationTrait;

  /**
   * {@inheritdoc}
   */
  protected $entityTypes = [
    'entity_test',
  ];

  /**
   * DB Connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['node', 'text', 'filter', 'options'];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->installConfig(['node', 'filter']);
    $this->installEntitySchema('node');
    $this->createContentType(['type' => 'page']);
    $this->setupTermField('node', 'page', 'termz');
    $this->database = \Drupal::service('database');
  }

  /**
   * {@inheritdoc}
   */
  protected function createBundles($entity_type_id) {
    entity_test_create_bundle('termz');
    return ['termz'];
  }

  /**
   * Tests operations that insert/update/delete to the index table.
   */
  public function testWritingToIndexTable() {
    $vocab = $this->createVocabulary();
    $term1 = $this->createTerm($vocab);
    $term2 = $this->createTerm($vocab);
    $term3 = $this->createTerm($vocab);
    $term4 = $this->createTerm($vocab);
    $this->assertThatDisabledEntityTypesDoNotWriteToTheIndex([$term1, $term2]);
    $entity = $this->assertThatEntityInsertWritesToTheIndex([$term1,
      $term2,
      $term3,
    ]);
    $this->assertThatEntityInsertWritesToTheIndex([$term1]);
    $entity = $this->assertThatEntityUpdatesModifyTheIndex($entity, [$term1,
      $term2,
      $term4,
    ]);
    $this->assertThatTermDeletionUpdatesTheIndex($entity, [$term1, $term2], [$term4]);
    $this->assertThatEntityDeletionUpdatesTheIndex($entity);
  }

  /**
   * Test that disabled entity types don't write to the index.
   *
   * @param \Drupal\taxonomy\TermInterface[] $terms
   *   Terms to reference.
   */
  protected function assertThatDisabledEntityTypesDoNotWriteToTheIndex(array $terms) {
    // Create a node with a term, should not write to the index as nodes are not
    // enabled.
    $this->createNode([
      'type' => 'page',
      'termz' => $terms,
    ]);

    $this->assertCount(0, $this->database->select('taxonomy_entity_index', 'tei')
      ->fields('tei')
      ->execute()
      ->fetchAll());
  }

  /**
   * Test that entity creation writes to the index.
   *
   * @param \Drupal\taxonomy\TermInterface[] $terms
   *   Terms to reference.
   *
   * @return \Drupal\entity_test\Entity\EntityTest
   *   Test entity.
   */
  protected function assertThatEntityInsertWritesToTheIndex(array $terms) {
    $entity = EntityTest::create([
      'type' => 'termz',
      'termz' => $terms,
    ]);
    $entity->save();

    $this->assertCount(count($terms), $this->database->select('taxonomy_entity_index', 'tei')
      ->fields('tei')
      ->condition('entity_id', $entity->id())
      ->condition('entity_type', $entity->getEntityTypeId())
      ->execute()
      ->fetchAll());

    return $entity;
  }

  /**
   * Test that updates to entities modify the index.
   *
   * @param \Drupal\entity_test\Entity\EntityTest $entity
   *   Entity to update.
   * @param \Drupal\taxonomy\TermInterface[] $terms
   *   Terms to reference.
   *
   * @return \Drupal\entity_test\Entity\EntityTest
   *   Test entity.
   */
  protected function assertThatEntityUpdatesModifyTheIndex(EntityTest $entity, array $terms) {
    $entity->termz = $terms;
    $entity->save();

    $records = $this->database->select('taxonomy_entity_index', 'tei')
      ->fields('tei')
      ->condition('entity_id', $entity->id())
      ->condition('entity_type', $entity->getEntityTypeId())
      ->execute()
      ->fetchAll();
    $this->assertCount(count($terms), $records);

    $delta = 0;
    $this->assertEquals(array_map(function (TermInterface $term) use ($entity, &$delta) {
      return (object) [
        'entity_type' => 'entity_test',
        'bundle' => 'termz',
        'entity_id' => $entity->id(),
        'revision_id' => $entity->id(),
        'field_name' => 'termz',
        'delta' => $delta++,
        'tid' => $term->id(),
      ];
    }, $terms), $records);

    return $entity;
  }

  /**
   * Assert that deleting a term deletes the item from the index.
   *
   * @param \Drupal\entity_test\Entity\EntityTest $entity
   *   Test entity.
   * @param array $expected_terms
   *   Expected terms.
   * @param array $terms_to_delete
   *   Terms to delete.
   */
  protected function assertThatTermDeletionUpdatesTheIndex(EntityTest $entity, array $expected_terms, array $terms_to_delete) {
    foreach ($terms_to_delete as $term) {
      $term->delete();
    }
    $records = $this->database->select('taxonomy_entity_index', 'tei')
      ->fields('tei')
      ->condition('entity_id', $entity->id())
      ->condition('entity_type', $entity->getEntityTypeId())
      ->execute()
      ->fetchAll();
    $this->assertCount(count($expected_terms), $records);
    $delta = 0;
    $this->assertEquals(array_map(function (TermInterface $term) use ($entity, &$delta) {
      return (object) [
        'entity_type' => 'entity_test',
        'bundle' => 'termz',
        'entity_id' => $entity->id(),
        'revision_id' => $entity->id(),
        'field_name' => 'termz',
        'delta' => $delta++,
        'tid' => $term->id(),
      ];
    }, $expected_terms), $records);
  }

  /**
   * Test that deleting an entity updates the index.
   *
   * @param \Drupal\entity_test\Entity\EntityTest $entity
   *   Entity to update.
   */
  protected function assertThatEntityDeletionUpdatesTheIndex(EntityTest $entity) {
    $entity->delete();
    $this->assertCount(0, $this->database->select('taxonomy_entity_index', 'tei')
      ->fields('tei')
      ->condition('entity_id', $entity->id())
      ->condition('entity_type', $entity->getEntityTypeId())
      ->execute()
      ->fetchAll());
    // Should not remove other entries though (second entity created earlier).
    $this->assertGreaterThan(0, $this->database->select('taxonomy_entity_index', 'tei')
      ->fields('tei')
      ->condition('entity_id', $entity->id(), '<>')
      ->condition('entity_type', $entity->getEntityTypeId())
      ->execute()
      ->fetchAll());
  }

}
