<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Firewall_Authenticator_MainService extends App_KernelProdContainer
{
    /*
     * Gets the private 'security.firewall.authenticator.main' shared service.
     *
     * @return \Symfony\Component\Security\Http\Firewall\AuthenticatorManagerListener
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->privates['security.authenticator.jwt.main'] ?? $container->load('getSecurity_Authenticator_Jwt_MainService'));

        if (isset($container->privates['security.firewall.authenticator.main'])) {
            return $container->privates['security.firewall.authenticator.main'];
        }

        return $container->privates['security.firewall.authenticator.main'] = new \Symfony\Component\Security\Http\Firewall\AuthenticatorManagerListener(new \Symfony\Component\Security\Http\Authentication\AuthenticatorManager([$a], ($container->privates['security.token_storage'] ?? self::getSecurity_TokenStorageService($container)), ($container->privates['security.event_dispatcher.main'] ?? self::getSecurity_EventDispatcher_MainService($container)), 'main', ($container->privates['monolog.logger.security'] ?? self::getMonolog_Logger_SecurityService($container)), true, true, []));
    }
}
