<?php

namespace Drupal\Tests\taxonomy_entity_index\Functional\Views;

use Drupal\Tests\taxonomy\Functional\Views\TaxonomyTestBase;
use Drupal\views\Tests\ViewTestData;

/**
 * Base class for all taxonomy tests.
 */
abstract class TaxonomyEntityIndexTestBase extends TaxonomyTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = [
    'taxonomy',
    'taxonomy_entity_index',
    'taxonomy_entity_index_test_views',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp($import_test_views = TRUE, $modules = []): void {
    parent::setUp($import_test_views, $modules);

    if ($import_test_views) {
      ViewTestData::createTestViews(get_class($this), ['taxonomy_entity_index_test_views']);
    }
  }

}
