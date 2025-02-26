<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Container_Private_GosWebSocket_Registry_OriginsService extends App_KernelProdContainer
{
    /*
     * Gets the public '.container.private.gos_web_socket.registry.origins' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\Server\App\Registry\OriginRegistry
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['.container.private.gos_web_socket.registry.origins'] = new \Gos\Bundle\WebSocketBundle\Server\App\Registry\OriginRegistry();
    }
}
