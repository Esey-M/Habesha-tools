<?php

namespace ContainerQZGZx3P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getVichUploader_Listener_Inject_ImagesService extends App_KernelProdContainer
{
    /*
     * Gets the private 'vich_uploader.listener.inject.images' shared service.
     *
     * @return \Vich\UploaderBundle\EventListener\Doctrine\InjectListener
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->services['vich_uploader.upload_handler'] ?? $container->load('getVichUploader_UploadHandlerService'));

        if (isset($container->privates['vich_uploader.listener.inject.images'])) {
            return $container->privates['vich_uploader.listener.inject.images'];
        }

        return $container->privates['vich_uploader.listener.inject.images'] = new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('images', ($container->privates['vich_uploader.adapter.orm'] ??= new \Vich\UploaderBundle\Adapter\ORM\DoctrineORMAdapter()), ($container->privates['vich_uploader.metadata_reader'] ?? $container->load('getVichUploader_MetadataReaderService')), $a);
    }
}
