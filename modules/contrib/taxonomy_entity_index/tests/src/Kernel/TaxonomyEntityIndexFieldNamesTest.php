<?php

namespace Drupal\Tests\taxonomy_entity_index\Kernel;

/**
 * Defines a class for testing .
 *
 * @group taxonomy_entity_index
 */
class TaxonomyEntityIndexFieldNamesTest extends TaxonomyEntityIndexKernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected function createBundles($entity_type_id) {
    entity_test_create_bundle('test');
    return ['test'];
  }

  /**
   * Tests caching in taxonomy_entity_index_get_taxonomy_field_names().
   */
  public function testFieldNamesUpdate() {
    $fields = taxonomy_entity_index_get_taxonomy_field_names('entity_test');
    $this->assertEquals(['test' => ['termz']], $fields);
    drupal_static_reset('entity-taxonomy-fields_entity_test');
    drupal_static_reset('entity-taxonomy-field-defs_entity_test_test');
    $this->setupTermField('entity_test', 'test', 'another_field');
    $fields = taxonomy_entity_index_get_taxonomy_field_names('entity_test');
    $this->assertEquals(['test' => ['termz', 'another_field']], $fields);
  }

}
