<?php

namespace ContainerXLeSrxS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Lock_Default_Store_TTEhGTService extends App_KernelProdContainer
{
    /*
     * Gets the private '.lock.default.store.TTEh_gT' shared service.
     *
     * @return \Symfony\Component\Lock\PersistingStoreInterface
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.lock.default.store.TTEh_gT'] = \Symfony\Component\Lock\Store\StoreFactory::createStore($container->getEnv('LOCK_DSN'));
    }
}
