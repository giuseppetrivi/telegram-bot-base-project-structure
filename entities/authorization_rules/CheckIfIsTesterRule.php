<?php

namespace TGBot\entities\authorization_rules;

/** [THIS IS AN EXAMPLE OF RULE] */

/**
 * Check if a user can act as a tester of the bot
 */
class CheckIfIsTesterRule extends Rule {

  public function rule() {
    if ($this->getSystemConfig()->isTesting()) {
      if ($this->getUser()->isTester()) {
        return true;
      }
      return false;
    }
    return true;
  }

}

?>