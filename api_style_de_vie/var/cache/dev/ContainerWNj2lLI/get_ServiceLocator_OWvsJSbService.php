<?php

namespace ContainerWNj2lLI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_OWvsJSbService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.OWvsJSb' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.OWvsJSb'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'em' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'mailer' => ['privates', 'mailer.mailer', 'getMailer_MailerService', true],
            'passwordHasher' => ['privates', 'security.user_password_hasher', 'getSecurity_UserPasswordHasherService', true],
            'serializer' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', false],
        ], [
            'em' => '?',
            'mailer' => '?',
            'passwordHasher' => '?',
            'serializer' => '?',
        ]);
    }
}
