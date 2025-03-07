<?php

namespace ContainerTTjDzOq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Container_Private_GosWebSocket_Topic_PeriodicTimerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public '.container.private.gos_web_socket.topic.periodic_timer' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\Topic\TopicPeriodicTimer
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'gos'.\DIRECTORY_SEPARATOR.'web-socket-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Topic'.\DIRECTORY_SEPARATOR.'TopicPeriodicTimer.php';

        return $container->services['.container.private.gos_web_socket.topic.periodic_timer'] = new \Gos\Bundle\WebSocketBundle\Topic\TopicPeriodicTimer(($container->services['.container.private.gos_web_socket.server.event_loop'] ?? $container->load('get_Container_Private_GosWebSocket_Server_EventLoopService')));
    }
}
