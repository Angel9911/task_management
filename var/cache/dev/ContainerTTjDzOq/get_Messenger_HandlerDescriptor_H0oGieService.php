<?php

namespace ContainerTTjDzOq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Messenger_HandlerDescriptor_H0oGieService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.messenger.handler_descriptor.H_0oGie' shared service.
     *
     * @return \Symfony\Component\Messenger\Handler\HandlerDescriptor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'messenger'.\DIRECTORY_SEPARATOR.'Handler'.\DIRECTORY_SEPARATOR.'HandlerDescriptor.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'ScheduleJobs'.\DIRECTORY_SEPARATOR.'DeleteFileJob'.\DIRECTORY_SEPARATOR.'DeleteMessageHandlerJob.php';

        return $container->privates['.messenger.handler_descriptor.H_0oGie'] = new \Symfony\Component\Messenger\Handler\HandlerDescriptor(new \App\ScheduleJobs\DeleteFileJob\DeleteMessageHandlerJob(($container->privates['monolog.logger'] ?? self::getMonolog_LoggerService($container))), []);
    }
}
