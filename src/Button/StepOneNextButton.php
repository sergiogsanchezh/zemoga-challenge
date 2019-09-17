<?php

namespace Drupal\zemoga_challenge\Button;

use Drupal\zemoga_challenge\Service\FormBehaviors;

/**
 * Class StepOneNextButton.
 *
 * @package Drupal\zemoga_challenge\Button
 */
class StepOneNextButton extends BaseButton {

  /**
   * {@inheritdoc}
   */
  public function getKey() {
    return 'next';
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#type' => 'submit',
      '#value' => t('Next step'),
      '#goto_step' => FormBehaviors::STEP_TWO,
    ];
  }

}
