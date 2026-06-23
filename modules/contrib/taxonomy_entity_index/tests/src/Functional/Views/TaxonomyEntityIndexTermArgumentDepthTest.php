<?php

namespace Drupal\Tests\taxonomy_entity_index\Functional\Views;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\file\Entity\File;
use Drupal\media\Entity\Media;
use Drupal\Tests\media\Traits\MediaTypeCreationTrait;

/**
 * Tests the taxonomy term with depth argument.
 *
 * @group taxonomy_entity_index
 */
class TaxonomyEntityIndexTermArgumentDepthTest extends TaxonomyEntityIndexTestBase {

  use MediaTypeCreationTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'views',
    'node',
    'media',
  ];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  public static $testViews = ['test_argument_taxonomy_entity_index_index_tid_depth'];

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

    // Enable indexing for node and media.
    $this->config('taxonomy_entity_index.settings')
      ->set('types', ['node' => 'node', 'media' => 'media'])
      ->save();

    // Create a term.
    $first = $this->createTerm(['name' => 'First']);

    // Create a node called "Node with Term" that is linked to the term.
    $settings = ['type' => 'article', 'title' => 'Node with Term'];
    $settings['field_views_testing_tags'][0]['target_id'] = $first->id();
    $this->nodes[] = $this->drupalCreateNode($settings);

    // Create a node called "Node without Term" without any terms.
    $settings = [
      'type' => 'article',
      'title' => 'Node without Term',
    ];
    $node = $this->drupalCreateNode($settings);
    $this->nodes[] = $node;

    // Setup the media type.
    $media_type = $this->setupMediaTypeWithTaxonomy();

    // Create a file to upload to be used in the media item.
    $file = File::create([
      'uri' => 'public://llama.txt',
    ]);
    $file->setPermanent();
    $file->save();

    // Create a media item called "Media with Term" that has the same numeric
    // ID as "Node without Term" but is linked to the term.
    $media = Media::create([
      'bundle' => 'document',
      'name' => 'Media with Term',
      'mid' => $node->id(),
      'field_media_file' => [
        'target_id' => $file->id(),
      ],
      'field_views_testing_tags' => [
        'target_id' => $first->id(),
      ],
    ]);
    $media->save();

    $this->terms[0] = $first;
  }

  /**
   * Tests the term with depth argument handler.
   */
  public function testTermWithDepthArgument() {
    $this->drupalGet('test_argument_taxonomy_entity_index_index_tid_depth/' . $this->terms[0]->id());
    // "Node with Term" should be present on the page.
    $this->assertSession()->pageTextContains($this->nodes[2]->getTitle());

    // Media with the same numeric ID that is referencing the term should not
    // affect the results, thus ensuring that "Node without Term" should not be
    // present on the page.
    $this->assertSession()->pageTextNotContains($this->nodes[3]->getTitle());
  }

  /**
   * Creates a media type with a taxonomy field to use for testing.
   */
  protected function setupMediaTypeWithTaxonomy() {
    $media_type = $this->createMediaType('file', ['id' => 'document', 'label' => 'Document']);

    $handler_settings = [
      'target_bundles' => [
        $this->vocabulary->id() => $this->vocabulary->id(),
      ],
      'auto_create' => TRUE,
    ];
    // Create the taxonomy term reference field on the media.
    $this->createEntityReferenceField('media', 'document', 'field_views_testing_tags', 'Tags', 'taxonomy_term', 'default', $handler_settings, FieldStorageDefinitionInterface::CARDINALITY_UNLIMITED);
  }

}
