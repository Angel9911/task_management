<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Messenger_HandlerDescriptor_H0oGieService extends App_KernelProdContainer
{
    /*
     * Gets the private '.messenger.handler_descriptor.H_0oGie' shared service.
     *
     * @return \Symfony\Component\Messenger\Handler\HandlerDescriptor
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.messenger.handler_descriptor.H_0oGie'] = new \Symfony\Component\Messenger\Handler\HandlerDescriptor(new \App\ScheduleJobs\DeleteFileJob\DeleteMessageHandlerJob(($container->privates['monolog.logger'] ?? $container->load('getMonolog_LoggerService'))), []);
    }
}
