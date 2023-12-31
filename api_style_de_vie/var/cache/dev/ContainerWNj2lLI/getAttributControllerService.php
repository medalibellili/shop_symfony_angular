<?php

namespace ContainerWNj2lLI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAttributControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\AttributController' shared autowired service.
     *
     * @return \App\Controller\AttributController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/AttributController.php';

        $container->services['App\\Controller\\AttributController'] = $instance = new \App\Controller\AttributController();

        $instance->setContainer(($container->privates['.service_locator.GNc8e5B'] ?? $container->load('get_ServiceLocator_GNc8e5BService'))->withContext('App\\Controller\\AttributController', $container));

        return $instance;
    }
}
