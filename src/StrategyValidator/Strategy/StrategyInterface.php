<?php
namespace StrategyValidator\Strategy;

interface StrategyInterface {

    /**
    * 
    * @param $value Value or content to be validated.
    * @return boolean
    */
    public function isValid($value);

}
