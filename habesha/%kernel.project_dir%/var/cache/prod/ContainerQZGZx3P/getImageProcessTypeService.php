<?php

namespace ContainerQZGZx3P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getImageProcessTypeService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Form\ImageProcessType' shared autowired service.
     *
     * @return \App\Form\ImageProcessType
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Form\\ImageProcessType'] = new \App\Form\ImageProcessType();
    }
}
