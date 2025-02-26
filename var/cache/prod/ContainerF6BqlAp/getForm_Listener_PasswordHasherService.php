<?php

namespace ContainerF6BqlAp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getForm_Listener_PasswordHasherService extends App_KernelProdContainer
{
    /*
     * Gets the private 'form.listener.password_hasher' shared service.
     *
     * @return \Symfony\Component\Form\Extension\PasswordHasher\EventListener\PasswordHasherListener
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['form.listener.password_hasher'] = new \Symfony\Component\Form\Extension\PasswordHasher\EventListener\PasswordHasherListener(($container->privates['security.user_password_hasher'] ?? $container->load('getSecurity_UserPasswordHasherService')), ($container->privates['property_accessor'] ?? self::getPropertyAccessorService($container)));
    }
}
