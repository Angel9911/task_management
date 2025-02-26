<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGosPubsubRouter_CacheWarmer_RouterService extends App_KernelProdContainer
{
    /*
     * Gets the private 'gos_pubsub_router.cache_warmer.router' shared service.
     *
     * @return \Gos\Bundle\PubSubRouterBundle\CacheWarmer\RouterCacheWarmer
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['gos_pubsub_router.cache_warmer.router'] = new \Gos\Bundle\PubSubRouterBundle\CacheWarmer\RouterCacheWarmer((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'gos_pubsub_router.router_registry' => ['services', '.container.private.gos_pubsub_router.router_registry', 'get_Container_Private_GosPubsubRouter_RouterRegistryService', true],
        ], [
            'gos_pubsub_router.router_registry' => '?',
        ]))->withContext('gos_pubsub_router.cache_warmer.router', $container));
    }
}
