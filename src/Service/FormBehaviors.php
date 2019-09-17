<?php

namespace Drupal\zemoga_challenge\Service;

use Drupal\Core\Url;
use Drupal\media\Entity\Media;
use Drupal\node\Entity\Node;
use Drupal\Core\Template\Attribute;
use Drupal\Core\Entity\Query\QueryFactory;
use Drupal\Core\Link;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\zemoga_challenge\Step\StepInterface;

/**
 * Class FormBehaviors.
 *
 * @package Drupal\zemoga_challenge
 */
class FormBehaviors {

  /**
   * Steps used in form.
   */
  const STEP_ONE = 1;
  const STEP_TWO = 2;
  const STEP_THREE = 3;
  const STEP_FINALIZE = 6;

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityManager;

  /**
   * Multi steps of the form.
   *
   * @var \Drupal\zemoga_challenge\Step\StepInterface
   */
  protected $steps;

  /**
   * Constructs a new FormBehaviors object.
   */
  public function __construct() {

  }


  /**
   * Return steps associative array.
   *
   * @return array
   *   Associative array of steps.
   */
  public static function stepToArray() {
    return [
      self::STEP_ONE => 'step-one',
      self::STEP_TWO => 'step-two',
      self::STEP_THREE => 'step-three',
      self::STEP_FINALIZE => 'step-finalize',
    ];
  }

  /**
   * Map steps to it's class.
   *
   * @param int $step
   *   Step number.
   *
   * @return bool
   *   Return true if exist.
   */
  public static function stepMap($step) {
    $map = [
      self::STEP_ONE => 'Drupal\\zemoga_challenge\\Step\\StepOne',
      self::STEP_TWO => 'Drupal\\zemoga_challenge\\Step\\StepTwo',
      self::STEP_THREE => 'Drupal\\zemoga_challenge\\Step\\StepThree',
      self::STEP_FINALIZE => 'Drupal\\zemoga_challenge\\Step\\StepFinalize',
    ];

    return isset($map[$step]) ? $map[$step] : FALSE;
  }

  /**
   * Add a step to the steps property.
   *
   * @param \Drupal\zemoga_challenge\Step\StepInterface $step
   *   Step of the form.
   */
  public function addStep(StepInterface $step) {
    $this->steps[$step->getStep()] = $step;
  }


  /**
   * Fetches step from steps property, If it doesn't exist, create step object.
   *
   * @param int $step_id
   *   Step ID.
   *
   * @return \Drupal\zemoga_challenge\Step\StepInterface
   *   Return step object.
   */
  public function getStep($step_id) {
    if (isset($this->steps[$step_id])) {
      // If step was already initialized, use that step.
      // Chance is there are values stored on that step.
      $step = $this->steps[$step_id];
    }
    else {
      // Get class.
      $class = $this->stepMap($step_id);
      // Init step.
      $step = new $class($this);
    }

    return $step;
  }

}
