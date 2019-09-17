<?php

namespace Drupal\zemoga_challenge\Button;

/**
 * Class BaseButton.
 *
 * @package Drupal\zemoga_challenge\Button
 */
abstract class BaseButton implements ButtonInterface {

  /**
   * {@inheritdoc}
   */
  public function ajaxify() {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function getSubmitHandler() {
    return FALSE;
  }

}
