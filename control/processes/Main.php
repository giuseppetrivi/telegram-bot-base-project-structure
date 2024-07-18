<?php

use TGBot\view;
use TGBot\control\AbstractProcess;
use TGBot\view\Keyboards;

class Main extends AbstractProcess {

  protected array $valid_static_inputs = [
    view\MenuOptions::COMMAND_START => "startProcedure",
    view\MenuOptions::COMMAND_RESTART => "restartProcedure"
  ];

  protected function startProcedure() {
    $this->_Bot->sendMessage([
      'text' => "==> This is an example",
      'reply_markup' => Keyboards::getMainMenu()
    ]);
  }




}

?>