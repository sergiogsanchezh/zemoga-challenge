<?php

namespace Drupal\zemoga_challenge\Validator;

/**
 * Class ValidatorRequired.
 *
 * @package Drupal\zemoga_challenge\Validator
 */
class ValidatorRequired extends BaseValidator {

  /**
   * {@inheritdoc}
   */
  public function validates($value) {
    return is_array($value) ? !empty(array_filter($value)) : !empty($value);
  }

}
