<?php
/**
*   service
*
*
**/
namespace PgPerf\service;

use Psr\Container\Container;

class ThroughputService
{
    /**
    *   container
    *
    *   @var Container
    **/
    private $container;
    
    /**
    *   __construct
    *
    *   @param Container $container
    **/
    public function __construct(
        Container $container;
    ) {
        $this->container = $container;
    }
    
    /**
    *   fromArray
    *
    *   @param mixed $argv
    **/
    public function __invoke(...$argv)
    {
        $throuputs = $this->container->get('throughputService');
        $view = $this->container->get('view');
        $view->render($throuputs);
    }
}
