<?php

namespace ContainerYX0Sypr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Config\Security\UserProvider' shared autowired service.
     *
     * @return \App\Config\Security\UserProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'security-core'.\DIRECTORY_SEPARATOR.'User'.\DIRECTORY_SEPARATOR.'UserProviderInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Config'.\DIRECTORY_SEPARATOR.'Security'.\DIRECTORY_SEPARATOR.'UserProvider.php';

        $a = ($container->services['doctrine.orm.default_entity_manager'] ?? self::getDoctrine_Orm_DefaultEntityManagerService($container));

        if (isset($container->privates['App\\Config\\Security\\UserProvider'])) {
            return $container->privates['App\\Config\\Security\\UserProvider'];
        }

        return $container->privates['App\\Config\\Security\\UserProvider'] = new \App\Config\Security\UserProvider($a);
    }
}
