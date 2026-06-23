<?php

namespace Drupal\taxonomy_entity_index\Plugin\views\argument;

/**
 * Argument handler for entity taxonomy terms with depth, using the entity ID.
 *
 * @ingroup views_argument_handlers
 *
 * @ViewsArgument("taxonomy_entity_index_tid_depth")
 */
class TaxonomyEntityIndexTidDepth extends TaxonomyEntityIndexDepth {

  /**
   * {@inheritdoc}
   */
  protected function convertIdsToEntityIds($ids) {
    // The IDs provided should already be entity IDs.
    return $ids;
  }

}
