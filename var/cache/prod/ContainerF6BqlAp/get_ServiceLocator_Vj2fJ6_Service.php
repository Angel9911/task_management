<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Vj2fJ6_Service extends App_KernelProdContainer
{
    /*
     * Gets the private '.service_locator.vj2fJ6.' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.vj2fJ6.'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'userAuthenticator' => ['privates', 'App\\Config\\Security\\UserAuthenticator', 'getUserAuthenticatorService', true],
        ], [
            'userAuthenticator' => '?',
        ]);
    }
}
