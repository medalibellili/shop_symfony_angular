<?php

namespace ContainerWNj2lLI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFournisseurService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Entity\Fournisseur' shared autowired service.
     *
     * @return \App\Entity\Fournisseur
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['App\\Entity\\Fournisseur'] = new \App\Entity\Fournisseur();
    }
}
