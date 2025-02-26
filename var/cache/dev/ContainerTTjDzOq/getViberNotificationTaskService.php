<?php

namespace ContainerTTjDzOq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getViberNotificationTaskService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\private_lib\listeners\ViberNotificationTask' shared autowired service.
     *
     * @return \App\private_lib\listeners\ViberNotificationTask
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'private_lib'.\DIRECTORY_SEPARATOR.'listeners'.\DIRECTORY_SEPARATOR.'NotificationListener.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'private_lib'.\DIRECTORY_SEPARATOR.'listeners'.\DIRECTORY_SEPARATOR.'ViberNotificationTask.php';

        return $container->privates['App\\private_lib\\listeners\\ViberNotificationTask'] = new \App\private_lib\listeners\ViberNotificationTask(($container->privates['.debug.http_client'] ?? self::get_Debug_HttpClientService($container)), ($container->privates['monolog.logger'] ?? self::getMonolog_LoggerService($container)));
    }
}
