<?php

namespace Drupal\Tests\taxonomy_entity_index\Kernel;

use Drupal\Component\Utility\Unicode;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Tests\taxonomy\Traits\TaxonomyTestTrait;

/**
 * Defines a base class for taxonomy entity index kernel tests.
 */
abstract class TaxonomyEntityIndexKernelTestBase extends KernelTestBase {

  use TaxonomyTestTrait;

  /**
   * Entity Type IDs to enable taxonomy entity index for.
   *
   * @var array
   */
  protected $entityTypes = [
    'entity_test',
  ];

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'system',
    'user',
    'taxonomy_entity_index',
    'taxonomy',
    'text',
    'entity_test',
    'field',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    foreach (array_merge($this->entityTypes, ['taxonomy_term', 'user']) as $entity_type_id) {
      $this->installEntitySchema($entity_type_id);
    }
    $this->installConfig('taxonomy_entity_index');
    $this->installSchema('system', 'sequences');
    $this->installSchema('taxonomy_entity_index', 'taxonomy_entity_index');
    $this->config('taxonomy_entity_index.settings')->set('types', $this->entityTypes)->save();
    foreach ($this->entityTypes as $entity_type_id) {
      foreach ($this->createBundles($entity_type_id) as $bundle) {
        $this->setupTermField($entity_type_id, $bundle, 'termz');
      }
    }
  }

  /**
   * Creates bundles required for testing the given entity type.
   *
   * @param string $entity_type_id
   *   Entity Type ID to create bundles for.
   *
   * @return array
   *   Array of bundle IDs created
   */
  abstract protected function createBundles($entity_type_id);

  /**
   * Creates a new entity reference field for the given bundle.
   *
   * @param string $entity_type_id
   *   Entity type to add the field to.
   * @param string $bundle
   *   Bundle of field.
   * @param string $field_name
   *   Field name.
   */
  protected function setupTermField($entity_type_id, $bundle, $field_name) {
    if (!FieldStorageConfig::load("$entity_type_id.$field_name")) {
      $storage = FieldStorageConfig::create([
        'entity_type' => $entity_type_id,
        'field_name' => $field_name,
        'id' => "$entity_type_id.$field_name",
        'type' => 'entity_reference',
        'settings' => [
          'target_type' => 'taxonomy_term',
        ],
      ]);
      $storage->save();
    }

    if (!FieldConfig::load("$entity_type_id.$bundle.$field_name")) {
      $config = FieldConfig::create([
        'field_name' => $field_name,
        'entity_type' => $entity_type_id,
        'bundle' => $bundle,
        'id' => "$entity_type_id.$bundle.$field_name",
        'label' => Unicode::ucfirst($field_name),
      ]);
      $config->save();
    }
  }

}
