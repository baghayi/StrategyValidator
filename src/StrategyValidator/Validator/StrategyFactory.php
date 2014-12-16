<?php
namespace StrategyValidator\Validator;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\MutableCreationOptionsInterface;
use StrategyValidator\Validator\Strategy as StrategyValidator;
use StrategyValidator\Exception\StrategyNotFound;
use StrategyValidator\Strategy\StrategyInterface;

class StrategyFactory implements FactoryInterface, MutableCreationOptionsInterface {

    /**
     * @var array
     */
    protected $options = array();

    /**
     * Set options property
     *
     * @param array $options
     */
    public function setCreationOptions(array $options)
    {
        $this->options = $options;
    }

    public function createService(ServiceLocatorInterface $validatorPluginManager){
        $sm = $validatorPluginManager->getServiceLocator();

        if(!isset($this->options['strategy']))
            throw new StrategyNotFound('Strategy is not specified.');

        if(!$sm->has($this->options['strategy']))
            throw new StrategyNotFound('Strategy is not defined in the main service manager.');

        $strategy = $sm->get($this->options['strategy']);
        if(!$strategy instanceof StrategyInterface)
            throw new StrategyNotFound('Specified strategy is not implementing StrategyValidator\Strategy\'trategyInterface interface.');

        return new StrategyValidator($strategy, $this->options);
    }
}
