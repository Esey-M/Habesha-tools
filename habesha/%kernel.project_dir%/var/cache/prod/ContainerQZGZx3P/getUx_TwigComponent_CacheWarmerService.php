<?php

namespace ContainerQZGZx3P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUx_TwigComponent_CacheWarmerService extends App_KernelProdContainer
{
    /*
     * Gets the private 'ux.twig_component.cache_warmer' shared service.
     *
     * @return \Symfony\UX\TwigComponent\CacheWarmer\TwigComponentCacheWarmer
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['ux.twig_component.cache_warmer'] = new \Symfony\UX\TwigComponent\CacheWarmer\TwigComponentCacheWarmer((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'ux.twig_component.component_properties' => ['privates', 'ux.twig_component.component_properties', 'getUx_TwigComponent_ComponentPropertiesService', true],
        ], [
            'ux.twig_component.component_properties' => 'Symfony\\UX\\TwigComponent\\ComponentProperties',
        ]))->withContext('ux.twig_component.cache_warmer', $container));
    }
}
