<?php
namespace StrategyValidator;

use Zend\Stdlib\ArrayUtils;

class Module
{
    public function getConfig()
    {
        $mainConfig = include __DIR__ . '/config/module.config.php';
        $apigilityConfig = include __DIR__ . '/config/apigility.config.php';

        return ArrayUtils::merge($mainConfig, $apigilityConfig);
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
