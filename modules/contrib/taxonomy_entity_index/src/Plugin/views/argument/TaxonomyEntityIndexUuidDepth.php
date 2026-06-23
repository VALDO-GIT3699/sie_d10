<?php

namespace Drupal\taxonomy_entity_index\Plugin\views\argument;

use Drupal\Component\Uuid\Uuid;
use Drupal\Core\Database\Connection;
use Drupal\Core\Entity\EntityRepositoryInterface;
use Drupal\Core\Entity\EntityStorageInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Argument handler for entity taxonomy terms with depth, using the UUID.
 *
 * @ingroup views_argument_handlers
 *
 * @ViewsArgument("taxonomy_entity_index_term_uuid_depth")
 */
class TaxonomyEntityIndexUuidDepth extends TaxonomyEntityIndexDepth {

  /**
   * A repository that allows us to load entities by their UUIDs.
   *
   * @var \Drupal\Core\Entity\EntityRepositoryInterface
   */
  protected $entityRepository;

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityStorageInterface $termStorage, Connection $database, EntityRepositoryInterface $entityRepository) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $termStorage, $database);

    $this->entityRepository = $entityRepository;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager')->getStorage('taxonomy_term'),
      $container->get('database'),
      $container->get('entity.repository')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function convertIdsToEntityIds($ids) {
    if (!is_array($ids)) {
      $ids = [$ids];
    }

    $entity_ids = [];
    $entity_type = $this->termStorage->getEntityTypeId();

    foreach ($ids as $uuid) {
      if (!Uuid::isValid($uuid) || (!$entity = $this->entityRepository->loadEntityByUuid($entity_type, $uuid))) {
        continue;
      }
      $entity_ids[] = $entity->id();
    }
    return $entity_ids;
  }

}
