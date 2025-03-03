<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMercure_Hub_DefaultService extends App_KernelProdContainer
{
    /*
     * Gets the private 'mercure.hub.default' shared service.
     *
     * @return \Symfony\Component\Mercure\Hub
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = new \Symfony\Component\Mercure\Jwt\LcobucciFactory($container->getEnv('string:MERCURE_PUBLISHER_JWT_SECRET'), 'hmac.sha256', NULL, '');

        return $container->privates['mercure.hub.default'] = new \Symfony\Component\Mercure\Hub($container->getEnv('MERCURE_URL'), new \Symfony\Component\Mercure\Jwt\FactoryTokenProvider($a, [], ['*']), $a, $container->getEnv('MERCURE_PUBLIC_URL'), ($container->privates['http_client.uri_template'] ?? $container->load('getHttpClient_UriTemplateService')));
    }
}
