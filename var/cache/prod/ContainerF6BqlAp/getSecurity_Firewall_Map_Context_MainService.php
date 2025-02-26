<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Firewall_Map_Context_MainService extends App_KernelProdContainer
{
    /*
     * Gets the private 'security.firewall.map.context.main' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\LazyFirewallContext
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->privates['security.authenticator.jwt.main'] ?? $container->load('getSecurity_Authenticator_Jwt_MainService'));

        if (isset($container->privates['security.firewall.map.context.main'])) {
            return $container->privates['security.firewall.map.context.main'];
        }

        return $container->privates['security.firewall.map.context.main'] = new \Symfony\Bundle\SecurityBundle\Security\LazyFirewallContext(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['security.channel_listener'] ?? $container->load('getSecurity_ChannelListenerService'));
            yield 1 => ($container->privates['security.context_listener.0'] ?? self::getSecurity_ContextListener_0Service($container));
            yield 2 => ($container->privates['security.firewall.authenticator.main'] ?? $container->load('getSecurity_Firewall_Authenticator_MainService'));
            yield 3 => ($container->privates['security.access_listener'] ?? $container->load('getSecurity_AccessListenerService'));
        }, 4), new \Symfony\Component\Security\Http\Firewall\ExceptionListener(($container->privates['security.token_storage'] ?? self::getSecurity_TokenStorageService($container)), ($container->privates['security.authentication.trust_resolver'] ??= new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver()), ($container->privates['security.http_utils'] ?? $container->load('getSecurity_HttpUtilsService')), 'main', $a, NULL, NULL, ($container->privates['monolog.logger.security'] ?? self::getMonolog_Logger_SecurityService($container)), false), NULL, new \Symfony\Bundle\SecurityBundle\Security\FirewallConfig('main', 'security.user_checker', NULL, true, false, 'App\\Config\\Security\\UserProvider', 'main', 'security.authenticator.jwt.main', NULL, NULL, ['jwt'], NULL, NULL), ($container->privates['security.untracked_token_storage'] ??= new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage()));
    }
}
