<?php

namespace Drupal\zemoga_challenge\Step;

use Drupal\zemoga_challenge\Service\FormBehaviors;

/**
 * Class StepFinalize.
 *
 * @package Drupal\zemoga_challenge\Step
 */
class StepFinalize extends BaseStep {

  /**
   * {@inheritdoc}
   */
  protected function setStep() {
    return FormBehaviors::STEP_FINALIZE;
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function buildStepFormElements() {

    $form['completed'] = [
      '#markup' => t('You have completed the wizard, yeah!'),
    ];

    return $form;
  }

}
