<?php

namespace TGBot\entities\authorization_rules;

/** [THIS IS AN EXAMPLE OF RULE] */

/**
 * Check if a user is active to use the bot
 */
class CheckIfIsActiveRule extends Rule {

  public function rule() {
    if ($this->getUser()->isActive()) {
      return true;
    }
    return false;
  }

}

?>