<?php

namespace ContainerYX0Sypr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGosWebSocket_Server_Application_WampService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'gos_web_socket.server.application.wamp' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\Server\App\WampApplication
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'cboden'.\DIRECTORY_SEPARATOR.'ratchet'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Ratchet'.\DIRECTORY_SEPARATOR.'ComponentInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'cboden'.\DIRECTORY_SEPARATOR.'ratchet'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Ratchet'.\DIRECTORY_SEPARATOR.'Wamp'.\DIRECTORY_SEPARATOR.'WampServerInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'gos'.\DIRECTORY_SEPARATOR.'web-socket-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Server'.\DIRECTORY_SEPARATOR.'App'.\DIRECTORY_SEPARATOR.'PushableWampServerInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'gos'.\DIRECTORY_SEPARATOR.'web-socket-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Server'.\DIRECTORY_SEPARATOR.'App'.\DIRECTORY_SEPARATOR.'WampApplication.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'gos'.\DIRECTORY_SEPARATOR.'web-socket-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Router'.\DIRECTORY_SEPARATOR.'WampRouter.php';

        $a = ($container->services['.container.private.gos_web_socket.dispatcher.topic'] ?? $container->load('get_Container_Private_GosWebSocket_Dispatcher_TopicService'));

        if (isset($container->privates['gos_web_socket.server.application.wamp'])) {
            return $container->privates['gos_web_socket.server.application.wamp'];
        }
        $b = ($container->services['event_dispatcher'] ?? self::getEventDispatcherService($container));

        if (isset($container->privates['gos_web_socket.server.application.wamp'])) {
            return $container->privates['gos_web_socket.server.application.wamp'];
        }
        $c = new \Gos\Bundle\WebSocketBundle\Router\WampRouter(($container->privates['gos_pubsub_router.router.websocket'] ?? $container->load('getGosPubsubRouter_Router_WebsocketService')));

        $d = ($container->privates['monolog.logger.websocket'] ?? $container->load('getMonolog_Logger_WebsocketService'));

        $c->setLogger($d);

        $container->privates['gos_web_socket.server.application.wamp'] = $instance = new \Gos\Bundle\WebSocketBundle\Server\App\WampApplication(($container->services['.container.private.gos_web_socket.dispatcher.rpc'] ?? $container->load('get_Container_Private_GosWebSocket_Dispatcher_RpcService')), $a, $b, ($container->privates['gos_web_socket.client.storage'] ?? $container->load('getGosWebSocket_Client_StorageService')), $c);

        $instance->setLogger($d);

        return $instance;
    }
}
