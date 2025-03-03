<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTurbo_Mercure_Default_RendererService extends App_KernelProdContainer
{
    /*
     * Gets the private 'turbo.mercure.default.renderer' shared service.
     *
     * @return \Symfony\UX\Turbo\Bridge\Mercure\TurboStreamListenRenderer
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->privates['stimulus.helper'] ?? $container->load('getStimulus_HelperService'));

        if (isset($container->privates['turbo.mercure.default.renderer'])) {
            return $container->privates['turbo.mercure.default.renderer'];
        }

        return $container->privates['turbo.mercure.default.renderer'] = new \Symfony\UX\Turbo\Bridge\Mercure\TurboStreamListenRenderer(($container->privates['mercure.hub.default'] ?? $container->load('getMercure_Hub_DefaultService')), $a, ($container->privates['turbo.id_accessor'] ?? $container->load('getTurbo_IdAccessorService')));
    }
}
