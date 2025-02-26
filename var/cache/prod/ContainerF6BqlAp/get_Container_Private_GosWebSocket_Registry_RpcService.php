<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Container_Private_GosWebSocket_Registry_RpcService extends App_KernelProdContainer
{
    /*
     * Gets the public '.container.private.gos_web_socket.registry.rpc' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\Server\App\Registry\RpcRegistry
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['.container.private.gos_web_socket.registry.rpc'] = new \Gos\Bundle\WebSocketBundle\Server\App\Registry\RpcRegistry();
    }
}
