<?php

namespace ContainerQZGZx3P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCache_Ux_TwigComponentService extends App_KernelProdContainer
{
    /*
     * Gets the private 'cache.ux.twig_component' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['cache.ux.twig_component'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('nEi9npivtT', 0, $container->getParameter('container.build_id'), (\dirname(__DIR__, 5).'//Users/simonmhretab/Documents/Habesha-tools/habesha/var/cache/prod/pools/system'), ($container->privates['monolog.logger.cache'] ?? $container->load('getMonolog_Logger_CacheService')));
    }
}
