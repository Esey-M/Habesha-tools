<?php

namespace ContainerQZGZx3P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCache_AppService extends App_KernelProdContainer
{
    /*
     * Gets the public 'cache.app' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\FilesystemAdapter
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->services['cache.app'] = $instance = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('5K9N3oiSO2', 0, (\dirname(__DIR__, 5).'//Users/simonmhretab/Documents/Habesha-tools/habesha/var/cache/prod/pools/app'), ($container->privates['cache.default_marshaller'] ??= new \Symfony\Component\Cache\Marshaller\DefaultMarshaller(NULL, false)));

        $instance->setLogger(($container->privates['monolog.logger.cache'] ?? $container->load('getMonolog_Logger_CacheService')));

        return $instance;
    }
}
