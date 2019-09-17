<?php

namespace Drupal\zemoga_challenge\Button;

use Drupal\zemoga_challenge\Service\FormBehaviors;

/**
 * Class StepThreePreviousButton.
 *
 * @package Drupal\zemoga_challenge\Button
 */
class StepThreePreviousButton extends BaseButton {

  /**
   * {@inheritdoc}
   */
  public function getKey() {
    return 'previous';
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#type' => 'submit',
      '#value' => t('Previous'),
      '#goto_step' => FormBehaviors::STEP_TWO,
      '#skip_validation' => TRUE,
    ];
  }

}
