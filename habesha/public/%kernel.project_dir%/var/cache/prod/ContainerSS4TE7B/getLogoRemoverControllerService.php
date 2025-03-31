<?php

namespace ContainerSS4TE7B;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLogoRemoverControllerService extends App_KernelProdContainer
{
    /*
     * Gets the public 'App\Controller\LogoRemoverController' shared autowired service.
     *
     * @return \App\Controller\LogoRemoverController
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->services['App\\Controller\\LogoRemoverController'] = $instance = new \App\Controller\LogoRemoverController(($container->services['doctrine.orm.default_entity_manager'] ?? $container->load('getDoctrine_Orm_DefaultEntityManagerService')), new \App\Service\LogoRemovalService(($container->privates['parameter_bag'] ??= new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($container)), ($container->privates['monolog.logger'] ?? $container->load('getMonolog_LoggerService'))), ($container->privates['App\\Service\\UsageLimitService'] ?? $container->load('getUsageLimitServiceService')), new \Symfony\Component\RateLimiter\RateLimiterFactory(['policy' => 'sliding_window', 'limit' => 60, 'interval' => '60 minutes', 'id' => 'logo_remover'], new \Symfony\Component\RateLimiter\Storage\CacheStorage(($container->services['cache.rate_limiter'] ?? $container->load('getCache_RateLimiterService'))), ($container->privates['lock.default.factory'] ?? $container->load('getLock_Default_FactoryService'))));

        $instance->setContainer(($container->privates['.service_locator.su0H1mh'] ?? $container->load('get_ServiceLocator_Su0H1mhService'))->withContext('App\\Controller\\LogoRemoverController', $container));

        return $instance;
    }
}
