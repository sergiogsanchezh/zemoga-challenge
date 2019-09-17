<?php

namespace Drupal\zemoga_challenge\Step;

use Drupal\zemoga_challenge\Button\StepThreeFinishButton;
use Drupal\zemoga_challenge\Button\StepThreePreviousButton;
use Drupal\zemoga_challenge\Validator\ValidatorRegex;
use Drupal\zemoga_challenge\Validator\ValidatorRequired;
use Drupal\zemoga_challenge\Service\FormBehaviors;

/**
 * Class StepThree.
 *
 * @package Drupal\zemoga_challenge\Step
 */
class StepThree extends BaseStep {

  /**
   * {@inheritdoc}
   */
  protected function setStep() {
    return FormBehaviors::STEP_THREE;
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return [
      new StepThreePreviousButton(),
      new StepThreeFinishButton(),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildStepFormElements() {

    $form['completed'] = [
      '#markup' => t('Please, verify your user data.'),
    ];

    return $form;
  }


}
