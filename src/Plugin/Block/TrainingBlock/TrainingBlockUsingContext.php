<?php

namespace Drupal\training_module\Plugin\Block\TrainingBlock;

use Drupal\Core\Block\BlockBase;

/**
 * Return hello world.
 *
 * @Block(
 *  id = "training_block_using_context",
 *  admin_label = @Translation("Training block using context elements"),
 *  category = @Translation("Training module"),
 *  context_definitions = {
 *    "node" = @ContextDefinition(
 *        "entity:node",
 *        label = @Translation("Node"),
 *        description = @Translation("Node context"),
 *        required = FALSE,
 *    ),
 *    "user" = @ContextDefinition(
 *        "entity:user",
 *        label = @Translation("User"),
 *        description = @Translation("User context"),
 *        required = FALSE,
 *    ),
 *    "term" = @ContextDefinition(
 *        "entity:taxonomy_term",
 *        label = @Translation("Term"),
 *        description = @Translation("Term context"),
 *        required = FALSE,
 *    ),
 *  }
 * )
 */
class TrainingBlockUsingContext extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $definitions = $this->getContextDefinitions();
    $contexts = $this->getContextValues();

    $node = $this->getContextValue('node');
    $term = $this->getContextValue('term');
    $user = $this->getContextValue('user');

    if (!\is_null($node)) {
      return [
        '#markup' => $node->getTitle(),
      ];
    }

    if (!\is_null($term)) {
      return [
        '#markup' => $term->getName(),
      ];
    }

    if (!\is_null($user)) {
      return [
        '#markup' => $user->getAccountName(),
      ];
    }

    return [
      '#markup' => 'Hello world',
    ];
  }

}
