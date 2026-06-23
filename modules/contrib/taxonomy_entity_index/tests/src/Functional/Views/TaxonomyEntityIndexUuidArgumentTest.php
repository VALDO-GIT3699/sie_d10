<?php

namespace Drupal\Tests\taxonomy_entity_index\Functional\Views;

use Drupal\node\NodeInterface;
use Drupal\views\Views;

/**
 * Test whether it is possible to select terms using a UUID argument.
 *
 * @group taxonomy
 */
class TaxonomyEntityIndexUuidArgumentTest extends TaxonomyEntityIndexTestBase {

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
   * Which test views to enable.
   *
   * @var string[]
   */
  public static $testViews = ['test_argument_taxonomy_entity_index_uuid'];

  /**
   * An array of nodes created in this particular test.
   *
   * Note the parent setup function creates at least two terms, and two nodes
   * tagged with those terms, and saves the nodes to $this->nodes - but those
   * nodes aren't relevant to this test.
   *
   * @see \Drupal\Tests\taxonomy\Functional\Views\TaxonomyTestBase::setUp()
   *
   * @var array
   */
  private $thisTestNodes = [];

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
   * An array of taxonomy term UUID strings, corresponding with $terms.
   *
   * @var string[]
   */
  protected $uuids = [];

  /**
   * {@inheritdoc}
   */
  protected function setUp($import_test_views = TRUE, $modules = []): void {
    parent::setUp($import_test_views, $modules);

    // Configure the eponymous Taxonomy Entity Index.
    $config = $this->config('taxonomy_entity_index.settings');
    $config->set('types.node', 'node');
    $config->set('index_revisions', FALSE);
    $config->set('index_per_field', FALSE);
    $config->save();

    // Create a term with a pre-defined UUID; and a node tagged with that term.
    $firstUuid = '0d82a97e-2688-4e8f-a913-72c9d0abbc5c';
    $this->uuids[0] = $firstUuid;
    $firstTerm = $this->createTerm(['name' => 'First', 'uuid' => $firstUuid]);
    $this->terms[0] = $firstTerm;

    // Create a node tagged with only the first term.
    $settings = ['type' => 'article'];
    $settings['field_views_testing_tags'][0]['target_id'] = $firstTerm->id();
    $this->thisTestNodes[0] = $this->drupalCreateNode($settings);
    taxonomy_entity_index_entity_update($this->thisTestNodes[0]);

    // Load the view configuration fixture we will use to test.
    $this->view = Views::getView('test_argument_taxonomy_entity_index_uuid');
  }

  /**
   * Test that it is possible to filter a view by term UUID.
   */
  public function testTermWithUuidFilter() {
    $expected = [['nid' => ($this->thisTestNodes[0])->id()]];
    $this->assertTermInResultsByUuid($this->uuids[0], $expected);
  }

  /**
   * Filter view by term UUID & assert nodes tagged with that term are returned.
   *
   * @param string $uuid
   *   The UUID to filter the view by.
   * @param array $expectedResultSet
   *   An array of results we expect to be /returned from the view when filtered
   *   by the given $uuid.
   *
   * @return bool
   *   TRUE if the actual result node stubs are identical to the expected node
   *   stubs; FALSE otherwise.
   */
  public function assertTermInResultsByUuid($uuid, array $expectedResultSet) {
    // Initialize the view.
    $this->view->destroy();
    $this->view->initDisplay();

    // Execute the view query.
    $this->executeView($this->view, [$uuid]);

    // Compare the result.
    return $this->assertIdenticalResultsetHelper($this->view, $expectedResultSet, ['nid' => 'nid'], 'assertIdentical');
  }

}
