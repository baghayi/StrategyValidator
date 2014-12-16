<?php
namespace StrategyValidator\Exception;

use Exception;

class StrategyNotFound extends Exception {

    public function __construct($message)
    {
        parent::__construct($message);
    }

}
