<?php

namespace ContainerXLeSrxS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Messenger_HandlerDescriptor_KEzMhfsService extends App_KernelProdContainer
{
    /*
     * Gets the private '.messenger.handler_descriptor.kEzMhfs' shared service.
     *
     * @return \Symfony\Component\Messenger\Handler\HandlerDescriptor
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = new \Symfony\Bundle\FrameworkBundle\Console\Application(($container->services['kernel'] ?? $container->get('kernel', 1)));
        $a->setAutoExit(false);

        return $container->privates['.messenger.handler_descriptor.kEzMhfs'] = new \Symfony\Component\Messenger\Handler\HandlerDescriptor(new \Symfony\Component\Console\Messenger\RunCommandMessageHandler($a), []);
    }
}
