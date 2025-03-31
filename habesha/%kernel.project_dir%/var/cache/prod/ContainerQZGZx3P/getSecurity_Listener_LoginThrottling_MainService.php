<?php

namespace ContainerQZGZx3P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Listener_LoginThrottling_MainService extends App_KernelProdContainer
{
    /*
     * Gets the private 'security.listener.login_throttling.main' shared service.
     *
     * @return \Symfony\Component\Security\Http\EventListener\LoginThrottlingListener
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->services['cache.rate_limiter'] ?? $container->load('getCache_RateLimiterService'));

        return $container->privates['security.listener.login_throttling.main'] = new \Symfony\Component\Security\Http\EventListener\LoginThrottlingListener(($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack()), new \Symfony\Component\Security\Http\RateLimiter\DefaultLoginRateLimiter(new \Symfony\Component\RateLimiter\RateLimiterFactory(['policy' => 'fixed_window', 'limit' => 25, 'interval' => '15 minutes', 'id' => '_login_global_main'], new \Symfony\Component\RateLimiter\Storage\CacheStorage($a), NULL), new \Symfony\Component\RateLimiter\RateLimiterFactory(['policy' => 'fixed_window', 'limit' => 5, 'interval' => '15 minutes', 'id' => '_login_local_main'], new \Symfony\Component\RateLimiter\Storage\CacheStorage($a), NULL), $container->getEnv('APP_SECRET')));
    }
}
