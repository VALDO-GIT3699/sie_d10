<?php

namespace Drupal\taxonomy_entity_index\Plugin\views\argument;

use Drupal\Core\Database\Connection;
use Drupal\Core\Database\Query\Condition;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\taxonomy\Plugin\views\argument\IndexTidDepth;
use Drupal\views\Plugin\views\display\DisplayPluginBase;
use Drupal\views\ViewExecutable;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Abstract argument handler for entity taxonomy terms with depth.
 *
 * @ingroup views_argument_handlers
 */
abstract class TaxonomyEntityIndexDepth extends IndexTidDepth {

  /**
   * Entity storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $termStorage;

  /**
   * Stores the base table information.
   *
   * @var array
   */
  private $baseTableInfo = [];

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager')->getStorage('taxonomy_term'),
      $container->get('database')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityStorageInterface $termStorage, Connection $database) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $termStorage);

    $this->database = $database;
  }

  /**
   * {@inheritdoc}
   */
  public function init(ViewExecutable $view, DisplayPluginBase $display, array &$options = NULL) {
    parent::init($view, $display, $options);
    $this->baseTableInfo = \Drupal::service('views.views_data')->get($this->table);
  }

  /**
   * {@inheritdoc}
   */
  public function query($group_by = FALSE) {
    $this->ensureMyTable();
    if (!empty($this->options['break_phrase']) && (static::breakString($this->argument)->value === [-1])) {
      return FALSE;
    }

    list($operator, $ids) = $this->getOperatorAndIds();
    if (!$tids = $this->convertIdsToEntityIds($ids)) {
      $tids = [-1];
    }

    // Now build the subqueries.
    $subquery = $this->database->select('taxonomy_entity_index', 'tn');

    $base_field = $this->baseTableInfo['taxonomy_entity_index_entity_tid']['relationship']['base field'];
    $real_field = $this->baseTableInfo['taxonomy_entity_index_entity_tid']['relationship']['real field'];

    $subquery->addField('tn', $base_field);

    if (isset($this->baseTableInfo['table']['entity type'])) {
      $subquery->condition('entity_type', $this->baseTableInfo['table']['entity type']);
    }

    $or = new Condition('OR');
    $where = $or->condition('tn.tid', $tids, $operator);
    $last = "tn";

    if ($this->options['depth'] > 0) {
      $subquery->leftJoin('taxonomy_term__parent', 'th', "th.entity_id = tn.tid");
      $last = "th";
      foreach (range(1, abs($this->options['depth'])) as $count) {
        $subquery->leftJoin('taxonomy_term__parent', "th$count", "$last.parent_target_id = th$count.entity_id");
        $where->condition("th$count.entity_id", $tids, $operator);
        $last = "th$count";
      }
    }
    elseif ($this->options['depth'] < 0) {
      foreach (range(1, abs($this->options['depth'])) as $count) {
        $subquery->leftJoin('taxonomy_term__parent', "th$count", "$last.entity_id = th$count.parent_target_id");
        $where->condition("th$count.entity_id", $tids, $operator);
        $last = "th$count";
      }
    }

    $subquery->condition($where);

    $this->query->addWhere(0, "$this->tableAlias.$real_field", $subquery, 'IN');
  }

  /**
   * Fetches the operator and the list of IDs.
   *
   * @return array
   *   The first item is the operator and second is the list of IDs.
   */
  protected function getOperatorAndIds() {
    $results = [];

    if (!empty($this->options['break_phrase'])) {
      $break = static::breakString($this->argument);
      $results[] = (count($break->value) > 1) ? 'IN' : '=';
      $results[] = $break->value;
    }
    else {
      $results[] = "=";
      $results[] = $this->argument;
    }

    return $results;
  }

  /**
   * Converts the provided IDs to taxonomy term entity IDs.
   *
   * @param mixed $ids
   *   Either the list of provided IDs or a single item.
   *
   * @return array
   *   The list of taxonomy term entity IDs.
   */
  abstract protected function convertIdsToEntityIds($ids);

}
