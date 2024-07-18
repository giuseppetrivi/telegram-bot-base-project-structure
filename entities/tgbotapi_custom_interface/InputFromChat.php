<?php

namespace TGBot\entities\tgbotapi_custom_interface;

use TGBot\entities\BaseEntity;

/**
 * Handle all info about the input from chatbot
 */
class InputFromChat extends BaseEntity {

  public $message_type = null;
  public $text = null;


  public function __construct($text, $message_type) {
    $this->text = $text;
    $this->message_type = $message_type;
  }

}

?>