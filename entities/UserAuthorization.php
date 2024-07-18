<?php

namespace TGBot\entities;

use Exception;
use TGBot\config\ConfigurationInfo;
use TGBot\entities\authorization_rules\Rule;
use TGBot\entities\authorization_rules\CheckIfIsActiveRule;
use TGBot\entities\authorization_rules\CheckIfIsTesterRule;

/**
 * Class that executes preliminary checks on the bot user
 */
class UserAuthorization extends BaseEntity {

  public array $rules = [];

  protected ?User $_User = null;
  protected ?ConfigurationInfo $_SystemConfig = null;

  public function __construct(User $_User, ConfigurationInfo $_SystemConfig) {
    $this->setUser($_User);
    $this->setSystemConfig($_SystemConfig);

    $this->rulesToAdd();
  }

  /**
   * Adds the specified rule into $rules array 
   * 
   * @param Rule $_Rule Specified rule object
   */
  private function addRule(Rule $_Rule) {
    array_push($this->rules, $_Rule);
  }

  /**
   * [HERE YOU SHOULD MODIFY]
   * Choose which specific rule objects add into $rules array
   */
  private function rulesToAdd() {
    $this->addRule(new CheckIfIsActiveRule($this->getUser(), $this->getSystemConfig()));
    $this->addRule(new CheckIfIsTesterRule($this->getUser(), $this->getSystemConfig()));
  }


  /**
   * Checks every rule into $rules array
   * 
   * @return void|Exception Exception when a rule is not fulfilled by the user, with the specific rule error message
   */
  public function verifyAuthorization() {
    $rules = $this->getRules();
    foreach ($rules as $_SpecificRuleInstance) {
      if (!$_SpecificRuleInstance->rule()) {
        throw new Exception($_SpecificRuleInstance->errorMessage());
        break;
      }
    }
  }

}

?>
