<?php

namespace ContainerYX0Sypr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserDtoService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\DTOs\UserDto' shared autowired service.
     *
     * @return \App\DTOs\UserDto
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'DTOs'.\DIRECTORY_SEPARATOR.'UserDto.php';

        return $container->privates['App\\DTOs\\UserDto'] = new \App\DTOs\UserDto();
    }
}
