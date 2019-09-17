<?php

namespace Drupal\zemoga_challenge\Step;

use Drupal\zemoga_challenge\Button\StepTwoNextButton;
use Drupal\zemoga_challenge\Button\StepTwoPreviousButton;
use Drupal\zemoga_challenge\Validator\ValidatorRequired;
use Drupal\zemoga_challenge\Service\FormBehaviors;
use Drupal\zemoga_challenge\Validator\ValidatorRegex;
use Drupal\zemoga_challenge\Button\StepThreeFinishButton;

/**
 * Class StepTwo.
 *
 * @package Drupal\zemoga_challenge\Step
 */
class StepTwo extends BaseStep {

  /**
   * {@inheritdoc}
   */
  protected function setStep() {
    return FormBehaviors::STEP_TWO;
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return [
      new StepTwoPreviousButton(),
      new StepThreeFinishButton(),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildStepFormElements() {
    $form['city'] = [
      '#type' => 'textfield',
      '#title' => t('City'),
      '#default_value' => isset($this->getValues()['city']) ? $this->getValues()['city'] : [],
      '#required' => TRUE,
    ];

    $form['phone'] = [
      '#type' => 'textfield',
      '#title' => t('Phone number'),
      '#default_value' => isset($this->getValues()['phone']) ? $this->getValues()['phone'] : [],
    ];

    $form['address'] = [
      '#type' => 'textfield',
      '#title' => t('Address'),
      '#default_value' => isset($this->getValues()['address']) ? $this->getValues()['address'] : [],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getFieldNames() {
    return [
      'city',
      'phone',
      'address',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFieldsValidators() {
    return [
      'city' => [
        new ValidatorRequired("City is a required field."),
      ],
      'phone' => [
        new ValidatorRegex(t("I don't think this is a valid Phone number"), '/[^0-9]/'),
      ],
    ];
  }

}
