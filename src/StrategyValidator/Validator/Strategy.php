<?php
namespace StrategyValidator\Validator;

use Zend\Validator\AbstractValidator;
use StrategyValidator\Strategy\StrategyInterface;

class Strategy extends AbstractValidator {

    /**
     * @var StrategyInterface\Strategy\StrategyInterface
     */
    protected $strategy;

    protected $options = array();

    const MESSAGE = 'message';

    protected $messageTemplates = [
        self::MESSAGE => '',
    ];

    public function __construct(StrategyInterface $strategy, array $options)
    {
        parent::__construct($options);
        $this->strategy = $strategy;
        $this->options = $options; 

    }

    /**
     *
     * Sets error message to be shown in case of a failure validation.
     * @return void
     */
    protected function setErrorMessage()
    {
        $this->error(self::MESSAGE, $this->options['message']);
    }

    /**
     * Checking $value against registered strategy to see if is valid or not.
     *
     * @param mixed $valud
     * @return boolean
     */
    public function isValid($value)
    {
        $this->setValue($value);

        if(false === $this->strategy->isValid($value)){
            $this->setErrorMessage();
            return false;
        }
        return true;
    }

}
