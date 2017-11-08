<?php

namespace AppWatcher\Exceptions;

class GeneralException extends \Exception {

    public function __construct($message, $code , Exception $previous = null){
        parent::__construct($message, $code, $previous);
    }

}




 ?>
