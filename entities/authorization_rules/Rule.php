<?php

namespace TGBot\entities\authorization_rules;

use ReflectionClass;
use TGBot\config\ConfigurationInfo;
use TGBot\entities\BaseEntity;
use TGBot\entities\User;

/**
 * Class to create generic rules to verify if a user can use the bot
 */
abstract class Rule extends BaseEntity {

  protected ?User $_User = null;
  protected ?ConfigurationInfo $_SystemConfig = null;

  public function __construct(User $_User, ConfigurationInfo $_SystemConfig) {
    $this->setUser($_User);
    $this->setSystemConfig($_SystemConfig);
  }

  /**
   * method to overwrite to define the rule
   * 
   * @return bool
   */
  abstract public function rule();


  /**
   * Error message in case of breaking rules (for logging)
   * 
   * @return string String to describe the error message
   */
  public function errorMessage() {
    $_ReflectionClass = new ReflectionClass($this);
    $error_message = "Un controllo (" . $_ReflectionClass->getShortName() . ") non è andato a buon fine";
    return $error_message;
  }

}


?>