<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRemovingOldLogFilesJobService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Command\RemovingOldLogFilesJob' shared autowired service.
     *
     * @return \App\Command\RemovingOldLogFilesJob
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['App\\Command\\RemovingOldLogFilesJob'] = $instance = new \App\Command\RemovingOldLogFilesJob(($container->privates['monolog.logger'] ?? $container->load('getMonolog_LoggerService')));

        $instance->setName('app:delete-old-files');
        $instance->setDescription('Delete old log files');

        return $instance;
    }
}
