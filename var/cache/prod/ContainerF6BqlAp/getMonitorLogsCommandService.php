<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMonitorLogsCommandService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Command\MonitorLogsCommand' shared autowired service.
     *
     * @return \App\Command\MonitorLogsCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['App\\Command\\MonitorLogsCommand'] = $instance = new \App\Command\MonitorLogsCommand(new \App\private_lib\websockets\ReaderLogFiles(($container->privates['monolog.logger'] ?? $container->load('getMonolog_LoggerService')), new \App\private_lib\websockets\MercurePublisherImpl(($container->privates['mercure.hub.default'] ?? $container->load('getMercure_Hub_DefaultService')))));

        $instance->setName('app:monitor-logs');
        $instance->setDescription('Monitor logs');

        return $instance;
    }
}
