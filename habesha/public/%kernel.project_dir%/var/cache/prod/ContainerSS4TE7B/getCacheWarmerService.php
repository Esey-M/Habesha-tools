<?php

namespace ContainerSS4TE7B;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCacheWarmerService extends App_KernelProdContainer
{
    /*
     * Gets the public 'cache_warmer' shared service.
     *
     * @return \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['cache_warmer'] = new \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['doctrine.orm.default_metadata_cache_warmer'] ?? $container->load('getDoctrine_Orm_DefaultMetadataCacheWarmerService'));
            yield 1 => ($container->privates['config_builder.warmer'] ?? $container->load('getConfigBuilder_WarmerService'));
            yield 2 => ($container->privates['translation.warmer'] ?? $container->load('getTranslation_WarmerService'));
            yield 3 => ($container->privates['router.cache_warmer'] ?? $container->load('getRouter_CacheWarmerService'));
            yield 4 => ($container->privates['validator.mapping.cache_warmer'] ?? $container->load('getValidator_Mapping_CacheWarmerService'));
            yield 5 => ($container->privates['doctrine.orm.proxy_cache_warmer'] ?? $container->load('getDoctrine_Orm_ProxyCacheWarmerService'));
            yield 6 => ($container->privates['twig.template_cache_warmer'] ?? $container->load('getTwig_TemplateCacheWarmerService'));
            yield 7 => ($container->privates['ux.twig_component.cache_warmer'] ?? $container->load('getUx_TwigComponent_CacheWarmerService'));
            yield 8 => ($container->privates['Vich\\UploaderBundle\\Metadata\\CacheWarmer'] ?? $container->load('getCacheWarmer2Service'));
        }, 9), false, (\dirname(__DIR__, 5).'//Users/simonmhretab/Documents/Habesha-tools/habesha/var/cache/prod/App_KernelProdContainerDeprecations.log'));
    }
}
