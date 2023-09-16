<?php

namespace ContainerWNj2lLI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_J1CqyfService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.J1Cqyf_' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.J1Cqyf_'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'em' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'serializer' => ['privates', '.errored.BBf9qrL', NULL, 'Cannot determine controller argument for "App\\Controller\\NotificationController::create()": the $serializer argument is type-hinted with the non-existent class or interface: "App\\Controller\\SerializerInterface". Did you forget to add a use statement?'],
        ], [
            'em' => '?',
            'serializer' => '?',
        ]);
    }
}