<?php

namespace SecondPath;

use TGBot\control\AbstractProcess;

class SameNameClass extends AbstractProcess {

  protected function mainCode() {
    echo "sono dentro a " . get_class($this);
  }

}

?>