<?php

namespace Drupal\zemoga_challenge\Service;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\user\Entity\User;

/**
 * Class EntityTools.
 */
class EntityTools {

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityManager;

  /**
   * Constructs a new EntityTools object.
   */
  public function __construct(EntityTypeManagerInterface $entity_manager) {
    $this->entityManager = $entity_manager;
  }

  private function validateExistingUser($first_name, $last_name){

    $ids = $this->entityManager->getStorage('user')->getQuery()
      ->condition('name', preg_replace("/[^a-zA-Z]+/", "", $first_name . $last_name))
      ->range(0, 1)
      ->execute();

    if(!empty($ids)){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  /**
   * Query over content.
   *
   * @param string $first_name
   *   User first name.
   * @param string $last_name
   *   User last name.
   * @param string $gender
   *   User gender.
   * @param string $birth.
   *   date string.
   * @param string $city
   *   User city.
   *
   */
  public function insertUser($first_name, $last_name, $gender, $birth, $city, $phone, $address) {

    $existing_user = $this->validateExistingUser($first_name, $last_name);
    if (!$existing_user) {
      $user = User::create();
      // Mandatory settings.
      $user->setPassword($first_name);
      $user->enforceIsNew();
      $user->setEmail(preg_replace("/[^a-zA-Z]+/", "", $first_name . $last_name) . '@mail.com');

      // This username must be unique and accept only a-Z,0-9, - _ @ .
      $user->setUsername(preg_replace("/[^a-zA-Z]+/", "", $first_name . $last_name));

      // Optional settings.
      $language = 'en';
      $user->set("init", 'email');

      if ($user->hasField('field_first_name') && !empty($first_name)) {
        $user->set('field_first_name', $first_name);
      }
      if ($user->hasField('field_last_name') && !empty($last_name)) {
        $user->set('field_last_name', $last_name);
      }
      if ($user->hasField('field_gender') && !empty($gender)) {
        $user->set('field_gender', $gender);
      }
      if ($user->hasField('field_birth') && !empty($birth)) {
        $user->set('field_birth', strtotime($birth));
      }
      if ($user->hasField('field_city') && !empty($city)) {
        $user->set('field_city', $city);
      }
      if ($user->hasField('field_phone') && !empty($phone)) {
        $user->set('field_phone', $phone);
      }
      if ($user->hasField('field_address') && !empty($address)) {
        $user->set('field_address', $address);
      }

      $user->activate();
      // Save user.
      $user->save();
      drupal_set_message("User created with uid " . $user->id());
    }else{
      drupal_set_message("User already exists, please try again with another name.");
    }
  }
}
