<?php

namespace Drupal\zemoga_challenge\Step;

use Drupal\zemoga_challenge\Button\StepOneNextButton;
use Drupal\zemoga_challenge\Validator\ValidatorRequired;
use Drupal\zemoga_challenge\Service\FormBehaviors;

/**
 * Class StepOne.
 *
 * @package Drupal\zemoga_challenge\Step
 */
class StepOne extends BaseStep {

  /**
   * {@inheritdoc}
   */
  protected function setStep() {
    return FormBehaviors::STEP_ONE;
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return [
      new StepOneNextButton(),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildStepFormElements() {

    //$_SESSION['back'] = $this->getValues();
    //print_r($_SESSION['back']);
    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => t("First Name"),
      '#required' => TRUE,
      '#default_value' => isset($this->getValues()['first_name']) ? $this->getValues()['first_name'] : NULL,
    ];

    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => t("Last Name"),
      '#required' => TRUE,
      '#default_value' => isset($this->getValues()['last_name']) ? $this->getValues()['last_name'] : NULL,
    ];

    $form['gender'] = [
      '#type' => 'select',
      '#title' => t("Gender"),
      '#options' => [
        'male' => 'Male',
        'female' => 'Female',
      ],
      '#required' => TRUE,
      '#default_value' => isset($this->getValues()['gender']) ? $this->getValues()['gender'] : NULL,
    ];

    $form['birth'] = [
      '#type' => 'date',
      '#title' => t("Date of Birth"),
      '#required' => TRUE,
      '#default_value' => isset($this->getValues()['birth']) ? $this->getValues()['birth'] : NULL,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getFieldNames() {
    return [
      'first_name',
      'last_name',
      'gender',
      'birth'
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFieldsValidators() {
    return [
      'first_name' => [
        new ValidatorRequired("Hey stranger, please tell me your first name. I would like to get to know you."),
      ],
      'last_name' => [
        new ValidatorRequired("Hey stranger, please tell me your last name. I would like to get to know you."),
      ],
      'gender' => [
        new ValidatorRequired("Hey stranger, please tell me your gender. I would like to get to know you."),
      ],
      'birth' => [
        new ValidatorRequired("Hey stranger, please tell me your date of birth. I would like to get to know you."),
      ],
    ];
  }

}
