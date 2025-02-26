<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Console_Command_CachePoolList_LazyService extends App_KernelProdContainer
{
    /*
     * Gets the private '.console.command.cache_pool_list.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.console.command.cache_pool_list.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('cache:pool:list', [], 'List available cache pools', false, #[\Closure(name: 'console.command.cache_pool_list', class: 'Symfony\\Bundle\\FrameworkBundle\\Command\\CachePoolListCommand')] fn (): \Symfony\Bundle\FrameworkBundle\Command\CachePoolListCommand => ($container->privates['console.command.cache_pool_list'] ?? $container->load('getConsole_Command_CachePoolListService')));
    }
}
