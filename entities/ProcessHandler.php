<?php

namespace TGBot\entities;

use DB;

/**
 * Class to handle process of the user (in database)
 */
class ProcessHandler extends BaseEntity {

  protected $user_id;

  public function __construct($user_id) {
    $this->setUserId($user_id);
  }

  /**
   * 
   */
  public function getProcessName() {
    /** db query to get user process info */
    /*
    [EXAMPLE]
    $result = DB::queryFirstRow("SELECT * FROM [CHANGE THIS: process_table] WHERE [CHANGE THIS: user_id]=%i", $this->getUserId());
    if ($result) { 
      return $result['process_path'];
    }
    else {
      // If there is no process in database, so you need to start the Main process class
      return "Main";
    }
    */
  }


  /**
   * 
   */
  public function createNewProcess() {
    /** db query to insert a new process for the user */
  }

  /**
   * 
   */
  public function updateProcess($new_process_name, $new_process_data=null) {
    /** db query to update user process attributes */
  }

  /**
   * 
   */
  public function updateOnlyProcessData($new_process_data) {
    /** db query to update user process data */
  }

  /**
   * 
   */
  public function deleteProcess() {
    /** db query to delete user process */
  }

}