<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getErrorLogControllerService extends App_KernelProdContainer
{
    /*
     * Gets the public 'App\Controller\ErrorLogController' shared autowired service.
     *
     * @return \App\Controller\ErrorLogController
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->services['App\\Controller\\ErrorLogController'] = $instance = new \App\Controller\ErrorLogController();

        $instance->setContainer(($container->privates['.service_locator.O2p6Lk7'] ?? $container->load('get_ServiceLocator_O2p6Lk7Service'))->withContext('App\\Controller\\ErrorLogController', $container));

        return $instance;
    }
}
