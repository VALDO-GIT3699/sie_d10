<?php

namespace Drupal\Tests\taxonomy_entity_index\Functional\Views;

use Drupal\node\NodeInterface;
use Drupal\views\Views;

/**
 * Test the taxonomy term with depth filter.
 *
 * @group taxonomy
 */
class TaxonomyEntityIndexTermFilterDepthTest extends TaxonomyEntityIndexTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'taxonomy_entity_index',
    'taxonomy',
    'taxonomy_entity_index_test_views',
    'views',
    'node',
  ];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  public static $testViews = ['test_filter_taxonomy_entity_index_index_tid_depth'];

  /**
   * An array of taxonomy term objects.
   *
   * @var \Drupal\taxonomy\TermInterface[]
   */
  protected $terms = [];

  /**
   * The loaded View object.
   *
   * @var \Drupal\views\ViewExecutable
   */
  protected $view;

  /**
   * {@inheritdoc}
   */
  protected function setUp($import_test_views = TRUE, $modules = []): void {
    parent::setUp($import_test_views, $modules);

    // Create a hierarchy 3 deep. Note the parent setup function creates two
    // top-level terms w/o children.
    $first = $this->createTerm(['name' => 'First']);
    $second = $this->createTerm(['name' => 'Second', 'parent' => $first->id()]);
    $third = $this->createTerm(['name' => 'Third', 'parent' => $second->id()]);

    // Create a node w/o any terms.
    $settings = ['type' => 'article'];
    $this->nodes[] = $this->drupalCreateNode($settings);

    // Create a node with only the top level term.
    $settings['field_views_testing_tags'][0]['target_id'] = $first->id();
    $this->nodes[] = $this->drupalCreateNode($settings);

    // Create a node with only the third level term.
    $settings['field_views_testing_tags'][0]['target_id'] = $third->id();
    $this->nodes[] = $this->drupalCreateNode($settings);

    $this->terms[0] = $first;
    $this->terms[1] = $second;
    $this->terms[2] = $third;

    $this->view = Views::getView('test_filter_taxonomy_entity_index_index_tid_depth');
  }

  /**
   * Tests the terms with depth filter.
   */
  public function testTermWithDepthFilter() {
    $column_map = ['nid' => 'nid'];
    $assert_method = 'assertIdentical';

    // Default view has an empty value for this filter, so all nodes should be
    // returned.
    $expected = array_map(function (NodeInterface $node) {
      return ['nid' => $node->id()];
    }, $this->nodes);
    $this->executeView($this->view);
    $this->assertIdenticalResultsetHelper($this->view, $expected, $column_map, $assert_method);

    // Set filter to search on top-level term, with depth 0.
    $expected = [['nid' => 4]];
    $this->assertTermWithDepthResult($this->terms[0]->id(), 0, $expected);

    // Top-level term, depth 1.
    $expected = [['nid' => 4]];
    $this->assertTermWithDepthResult($this->terms[0]->id(), 1, $expected);

    // Top-level term, depth 2.
    $expected = [['nid' => 4], ['nid' => 5]];
    $this->assertTermWithDepthResult($this->terms[0]->id(), 2, $expected);

    // Second-level term, depth 1.
    $expected = [['nid' => 5]];
    $this->assertTermWithDepthResult($this->terms[1]->id(), 1, $expected);

    // Third-level term, depth 0.
    $expected = [['nid' => 5]];
    $this->assertTermWithDepthResult($this->terms[2]->id(), 0, $expected);

    // Third-level term, depth 1.
    $expected = [['nid' => 5]];
    $this->assertTermWithDepthResult($this->terms[2]->id(), 1, $expected);

    // Third-level term, depth -2.
    $expected = [['nid' => 4], ['nid' => 5]];
    $this->assertTermWithDepthResult($this->terms[2]->id(), -2, $expected);
  }

  /**
   * Changes the filter to a given term and depth and then asserts the results.
   *
   * @param int $tid
   *   The term ID to filter on.
   * @param int $depth
   *   The depth to search.
   * @param array $expected
   *   The expected views result.
   */
  protected function assertTermWithDepthResult($tid, $depth, array $expected) {
    $this->view->destroy();
    $this->view->initDisplay();
    $filters = $this->view->displayHandlers->get('default')
      ->getOption('filters');
    $filters['tid_depth']['depth'] = $depth;
    $filters['tid_depth']['value'] = [$tid];
    $this->view->displayHandlers->get('default')
      ->setOption('filters', $filters);
    $this->executeView($this->view);
    $this->assertIdenticalResultsetHelper($this->view, $expected, ['nid' => 'nid'], 'assertIdentical');
  }

}
