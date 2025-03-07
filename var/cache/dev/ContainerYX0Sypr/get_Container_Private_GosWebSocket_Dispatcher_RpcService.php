<?php

namespace ContainerYX0Sypr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Container_Private_GosWebSocket_Dispatcher_RpcService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public '.container.private.gos_web_socket.dispatcher.rpc' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\Server\App\Dispatcher\RpcDispatcher
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'gos'.\DIRECTORY_SEPARATOR.'web-socket-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Server'.\DIRECTORY_SEPARATOR.'App'.\DIRECTORY_SEPARATOR.'Dispatcher'.\DIRECTORY_SEPARATOR.'RpcDispatcherInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'gos'.\DIRECTORY_SEPARATOR.'web-socket-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Server'.\DIRECTORY_SEPARATOR.'App'.\DIRECTORY_SEPARATOR.'Dispatcher'.\DIRECTORY_SEPARATOR.'RpcDispatcher.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'gos'.\DIRECTORY_SEPARATOR.'web-socket-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Server'.\DIRECTORY_SEPARATOR.'App'.\DIRECTORY_SEPARATOR.'Registry'.\DIRECTORY_SEPARATOR.'RpcRegistry.php';

        $container->services['.container.private.gos_web_socket.dispatcher.rpc'] = $instance = new \Gos\Bundle\WebSocketBundle\Server\App\Dispatcher\RpcDispatcher(($container->services['.container.private.gos_web_socket.registry.rpc'] ??= new \Gos\Bundle\WebSocketBundle\Server\App\Registry\RpcRegistry()));

        $instance->setLogger(($container->privates['monolog.logger.websocket'] ?? $container->load('getMonolog_Logger_WebsocketService')));

        return $instance;
    }
}
