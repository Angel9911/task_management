<?php

namespace ContainerTTjDzOq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRedisQueryCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Snc\RedisBundle\Command\RedisQueryCommand' shared service.
     *
     * @return \Snc\RedisBundle\Command\RedisQueryCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'Command.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'snc'.\DIRECTORY_SEPARATOR.'redis-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'RedisQueryCommand.php';

        $container->privates['Snc\\RedisBundle\\Command\\RedisQueryCommand'] = $instance = new \Snc\RedisBundle\Command\RedisQueryCommand(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'default' => ['privates', 'snc_redis.default', 'getSncRedis_DefaultService', true],
        ], [
            'default' => 'Redis',
        ]), ($container->privates['var_dumper.contextualized_cli_dumper'] ?? $container->load('getVarDumper_ContextualizedCliDumperService')), ($container->services['var_dumper.cloner'] ?? self::getVarDumper_ClonerService($container)));

        $instance->setName('redis:query');

        return $instance;
    }
}
