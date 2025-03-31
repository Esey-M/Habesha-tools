<?php

namespace ContainerSS4TE7B;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authenticator_RememberMeHandler_MainService extends App_KernelProdContainer
{
    /*
     * Gets the private 'security.authenticator.remember_me_handler.main' shared service.
     *
     * @return \Symfony\Component\Security\Http\RememberMe\SignatureRememberMeHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['security.authenticator.remember_me_handler.main'] = new \Symfony\Component\Security\Http\RememberMe\SignatureRememberMeHandler(new \Symfony\Component\Security\Core\Signature\SignatureHasher(($container->privates['property_accessor'] ?? $container->load('getPropertyAccessorService')), ['password'], $container->getEnv('APP_SECRET'), NULL, NULL), ($container->privates['security.user.provider.concrete.app_user_provider'] ?? $container->load('getSecurity_User_Provider_Concrete_AppUserProviderService')), ($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack()), ['secret' => $container->getEnv('APP_SECRET'), 'lifetime' => 604800, 'user_providers' => [], 'catch_exceptions' => true, 'signature_properties' => ['password'], 'name' => 'REMEMBERME', 'path' => '/', 'domain' => NULL, 'secure' => NULL, 'httponly' => true, 'samesite' => 'lax', 'always_remember_me' => false, 'remember_me_parameter' => '_remember_me'], ($container->services['monolog.logger.security'] ?? self::getMonolog_Logger_SecurityService($container)));
    }
}
