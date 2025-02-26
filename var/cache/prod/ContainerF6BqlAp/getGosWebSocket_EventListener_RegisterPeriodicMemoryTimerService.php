<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGosWebSocket_EventListener_RegisterPeriodicMemoryTimerService extends App_KernelProdContainer
{
    /*
     * Gets the private 'gos_web_socket.event_listener.register_periodic_memory_timer' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\EventListener\RegisterPeriodicMemoryTimerListener
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['gos_web_socket.event_listener.register_periodic_memory_timer'] = $instance = new \Gos\Bundle\WebSocketBundle\EventListener\RegisterPeriodicMemoryTimerListener(($container->services['.container.private.gos_web_socket.registry.periodic'] ??= new \Gos\Bundle\WebSocketBundle\Server\App\Registry\PeriodicRegistry()));

        $instance->setLogger(($container->privates['monolog.logger.websocket'] ?? $container->load('getMonolog_Logger_WebsocketService')));

        return $instance;
    }
}
