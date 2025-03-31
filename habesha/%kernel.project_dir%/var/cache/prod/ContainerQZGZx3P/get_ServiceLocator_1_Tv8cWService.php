<?php

namespace ContainerQZGZx3P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_1_Tv8cWService extends App_KernelProdContainer
{
    /*
     * Gets the private '.service_locator.1.tv8cW' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.1.tv8cW'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'imageProcessRepository' => ['privates', 'App\\Repository\\ImageProcessRepository', 'getImageProcessRepositoryService', true],
        ], [
            'imageProcessRepository' => 'App\\Repository\\ImageProcessRepository',
        ]);
    }
}
