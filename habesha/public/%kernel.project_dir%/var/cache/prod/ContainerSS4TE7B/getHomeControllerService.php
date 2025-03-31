<?php

namespace ContainerSS4TE7B;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getHomeControllerService extends App_KernelProdContainer
{
    /*
     * Gets the public 'App\Controller\HomeController' shared autowired service.
     *
     * @return \App\Controller\HomeController
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->services['App\\Controller\\HomeController'] = $instance = new \App\Controller\HomeController();

        $instance->setContainer(($container->privates['.service_locator.su0H1mh'] ?? $container->load('get_ServiceLocator_Su0H1mhService'))->withContext('App\\Controller\\HomeController', $container));

        return $instance;
    }
}
