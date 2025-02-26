<?php

namespace ContainerTTjDzOq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRemovingOldLogFilesJobService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Command\RemovingOldLogFilesJob' shared autowired service.
     *
     * @return \App\Command\RemovingOldLogFilesJob
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'Command.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'RemovingOldLogFilesJob.php';

        $container->privates['App\\Command\\RemovingOldLogFilesJob'] = $instance = new \App\Command\RemovingOldLogFilesJob(($container->privates['monolog.logger'] ?? self::getMonolog_LoggerService($container)));

        $instance->setName('app:delete-old-files');
        $instance->setDescription('Delete old log files');

        return $instance;
    }
}
