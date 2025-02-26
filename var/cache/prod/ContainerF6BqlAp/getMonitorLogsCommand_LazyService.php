<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMonitorLogsCommand_LazyService extends App_KernelProdContainer
{
    /*
     * Gets the private '.App\Command\MonitorLogsCommand.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.App\\Command\\MonitorLogsCommand.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('app:monitor-logs', [], 'Monitor logs', false, #[\Closure(name: 'App\\Command\\MonitorLogsCommand')] fn (): \App\Command\MonitorLogsCommand => ($container->privates['App\\Command\\MonitorLogsCommand'] ?? $container->load('getMonitorLogsCommandService')));
    }
}
