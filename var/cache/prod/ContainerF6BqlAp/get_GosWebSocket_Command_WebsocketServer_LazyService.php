<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_GosWebSocket_Command_WebsocketServer_LazyService extends App_KernelProdContainer
{
    /*
     * Gets the private '.gos_web_socket.command.websocket_server.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.gos_web_socket.command.websocket_server.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('gos:websocket:server', [], 'Starts the websocket server', false, #[\Closure(name: 'gos_web_socket.command.websocket_server', class: 'Gos\\Bundle\\WebSocketBundle\\Command\\WebsocketServerCommand')] fn (): \Gos\Bundle\WebSocketBundle\Command\WebsocketServerCommand => ($container->privates['gos_web_socket.command.websocket_server'] ?? $container->load('getGosWebSocket_Command_WebsocketServerService')));
    }
}
