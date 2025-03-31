<?php

namespace ContainerSS4TE7B;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getVichUploader_Command_MappingDebugClassService extends App_KernelProdContainer
{
    /*
     * Gets the private 'vich_uploader.command.mapping_debug_class' shared service.
     *
     * @return \Vich\UploaderBundle\Command\MappingDebugClassCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['vich_uploader.command.mapping_debug_class'] = $instance = new \Vich\UploaderBundle\Command\MappingDebugClassCommand(($container->privates['vich_uploader.metadata_reader'] ?? $container->load('getVichUploader_MetadataReaderService')));

        $instance->setName('vich:mapping:debug-class');

        return $instance;
    }
}
