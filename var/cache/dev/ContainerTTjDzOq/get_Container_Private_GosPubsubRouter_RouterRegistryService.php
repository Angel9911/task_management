<?php

namespace ContainerTTjDzOq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Container_Private_GosPubsubRouter_RouterRegistryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public '.container.private.gos_pubsub_router.router_registry' shared service.
     *
     * @return \Gos\Bundle\PubSubRouterBundle\Router\RouterRegistry
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'gos'.\DIRECTORY_SEPARATOR.'pubsub-router-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Router'.\DIRECTORY_SEPARATOR.'RouterRegistry.php';

        $container->services['.container.private.gos_pubsub_router.router_registry'] = $instance = new \Gos\Bundle\PubSubRouterBundle\Router\RouterRegistry();

        $instance->addRouter(($container->privates['gos_pubsub_router.router.websocket'] ?? $container->load('getGosPubsubRouter_Router_WebsocketService')));

        return $instance;
    }
}
