<?php

namespace ContainerXLeSrxS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTwig_Loader_NativeFilesystemService extends App_KernelProdContainer
{
    /*
     * Gets the private 'twig.loader.native_filesystem' shared service.
     *
     * @return \Twig\Loader\FilesystemLoader
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['twig.loader.native_filesystem'] = $instance = new \Twig\Loader\FilesystemLoader([], '/Users/simonmhretab/Documents/Habesha-tools/habesha');

        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/doctrine/doctrine-bundle/templates', 'Doctrine');
        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/doctrine/doctrine-bundle/templates', '!Doctrine');
        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/doctrine/doctrine-migrations-bundle/templates', 'DoctrineMigrations');
        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/doctrine/doctrine-migrations-bundle/templates', '!DoctrineMigrations');
        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/ux-twig-component/templates', 'TwigComponent');
        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/ux-twig-component/templates', '!TwigComponent');
        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/vich/uploader-bundle/templates', 'VichUploader');
        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/vich/uploader-bundle/templates', '!VichUploader');
        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/security-bundle/Resources/views', 'Security');
        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/security-bundle/Resources/views', '!Security');
        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/templates');
        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/twig-bridge/Resources/views/Email', 'email');
        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/twig-bridge/Resources/views/Email', '!email');
        $instance->addPath('/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/symfony/twig-bridge/Resources/views/Form');

        return $instance;
    }
}
