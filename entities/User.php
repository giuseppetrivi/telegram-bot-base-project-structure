<?php

namespace TGBot\entities;

use DB;

/**
 * Class to handle all attributes of the user
 */
class User extends BaseEntity {

  protected $user_id = null;
  protected ?ProcessHandler $_ProcessHandler = null;

  public function __construct($user_idtelegram) {
    /** query to get unique user info */
    
    $this->setUserId($user_idtelegram);
    $this->setProcessHandler(new ProcessHandler($this->getUserId()));
  }


  public function isActive() {
    return true;
  }

  public function isTester() {
    return true;
  }

}


?>