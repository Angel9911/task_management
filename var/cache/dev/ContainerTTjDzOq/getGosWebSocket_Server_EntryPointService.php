<?php

namespace ContainerTTjDzOq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGosWebSocket_Server_EntryPointService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'gos_web_socket.server.entry_point' shared service.
     *
     * @return \Gos\Bundle\WebSocketBundle\Server\EntryPoint
     *
     * @deprecated Since gos/web-socket-bundle 3.7: The "gos_web_socket.server.entry_point" service is deprecated and will be removed in GosWebSocketBundle 4.0.
     */
    public static function do($container, $lazyLoad = true)
    {
        trigger_deprecation('gos/web-socket-bundle', '3.7', 'The "gos_web_socket.server.entry_point" service is deprecated and will be removed in GosWebSocketBundle 4.0.');

        return $container->services['gos_web_socket.server.entry_point'] = new \Gos\Bundle\WebSocketBundle\Server\EntryPoint(($container->services['.container.private.gos_web_socket.registry.server'] ?? $container->load('get_Container_Private_GosWebSocket_Registry_ServerService')));
    }
}
