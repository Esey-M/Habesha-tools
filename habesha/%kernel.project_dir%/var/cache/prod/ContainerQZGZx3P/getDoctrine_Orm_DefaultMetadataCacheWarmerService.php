<?php

namespace ContainerQZGZx3P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_Orm_DefaultMetadataCacheWarmerService extends App_KernelProdContainer
{
    /*
     * Gets the private 'doctrine.orm.default_metadata_cache_warmer' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\CacheWarmer\DoctrineMetadataCacheWarmer
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['doctrine.orm.default_metadata_cache_warmer'] = new \Doctrine\Bundle\DoctrineBundle\CacheWarmer\DoctrineMetadataCacheWarmer(($container->services['doctrine.orm.default_entity_manager'] ?? $container->load('getDoctrine_Orm_DefaultEntityManagerService')), (\dirname(__DIR__, 5).'//Users/simonmhretab/Documents/Habesha-tools/habesha/var/cache/prod/doctrine/orm/default_metadata.php'));
    }
}
