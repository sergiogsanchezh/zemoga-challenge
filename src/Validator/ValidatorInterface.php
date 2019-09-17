<?php

namespace Drupal\zemoga_challenge\Validator;

/**
 * Interface ValidatorInterface.
 *
 * @package Drupal\zemoga_challenge\Validator
 */
interface ValidatorInterface {

  /**
   * Returns bool indicating if validation is ok.
   */
  public function validates($value);

  /**
   * Returns error message.
   */
  public function getErrorMessage();

}
