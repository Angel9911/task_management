<?php

namespace ContainerTTjDzOq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Container_Private_GosWebSocket_Wamp_TopicManagerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public '.container.private.gos_web_socket.wamp.topic_manager' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\Topic\TopicManager
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'cboden'.\DIRECTORY_SEPARATOR.'ratchet'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Ratchet'.\DIRECTORY_SEPARATOR.'WebSocket'.\DIRECTORY_SEPARATOR.'WsServerInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'cboden'.\DIRECTORY_SEPARATOR.'ratchet'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Ratchet'.\DIRECTORY_SEPARATOR.'ComponentInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'cboden'.\DIRECTORY_SEPARATOR.'ratchet'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Ratchet'.\DIRECTORY_SEPARATOR.'Wamp'.\DIRECTORY_SEPARATOR.'WampServerInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'gos'.\DIRECTORY_SEPARATOR.'web-socket-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Topic'.\DIRECTORY_SEPARATOR.'TopicManager.php';

        $container->services['.container.private.gos_web_socket.wamp.topic_manager'] = $instance = new \Gos\Bundle\WebSocketBundle\Topic\TopicManager();

        $instance->setWampApplication(($container->privates['gos_web_socket.server.application.wamp'] ?? $container->load('getGosWebSocket_Server_Application_WampService')));

        return $instance;
    }
}
