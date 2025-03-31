<?php

namespace ContainerSS4TE7B;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMonolog_Handler_BackgroundRemoverService extends App_KernelProdContainer
{
    /*
     * Gets the private 'monolog.handler.background_remover' shared service.
     *
     * @return \Monolog\Handler\StreamHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['monolog.handler.background_remover'] = $instance = new \Monolog\Handler\StreamHandler((\dirname(__DIR__, 5).'//Users/simonmhretab/Documents/Habesha-tools/habesha/var/log/background_remover.log'), 'debug', true, NULL, false);

        $instance->pushProcessor(($container->privates['monolog.processor.psr_log_message'] ??= new \Monolog\Processor\PsrLogMessageProcessor()));

        return $instance;
    }
}
