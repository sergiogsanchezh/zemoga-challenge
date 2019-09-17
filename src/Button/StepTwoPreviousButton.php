<?php

namespace Drupal\zemoga_challenge\Button;

use Drupal\zemoga_challenge\Service\FormBehaviors;

/**
 * Class StepTwoPreviousButton.
 *
 * @package Drupal\zemoga_challenge\Button
 */
class StepTwoPreviousButton extends BaseButton {

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
      '#goto_step' => FormBehaviors::STEP_ONE,
      '#skip_validation' => TRUE,
    ];
  }

}
