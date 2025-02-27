<?php

namespace ContainerYX0Sypr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTaskDtoService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\DTOs\TaskDto' shared autowired service.
     *
     * @return \App\DTOs\TaskDto
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'DTOs'.\DIRECTORY_SEPARATOR.'TaskDto.php';

        return $container->privates['App\\DTOs\\TaskDto'] = new \App\DTOs\TaskDto();
    }
}
