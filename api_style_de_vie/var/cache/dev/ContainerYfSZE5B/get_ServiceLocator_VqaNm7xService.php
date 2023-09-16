<?php

namespace ContainerYfSZE5B;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_VqaNm7xService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.vqaNm7x' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.vqaNm7x'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'er' => ['privates', 'App\\Repository\\EntrepriseRepository', 'getEntrepriseRepositoryService', true],
            'userRepository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
        ], [
            'er' => 'App\\Repository\\EntrepriseRepository',
            'userRepository' => 'App\\Repository\\UserRepository',
        ]);
    }
}
