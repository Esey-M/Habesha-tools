<?php

namespace ContainerXLeSrxS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_Dbal_DefaultConnection_EventManagerService extends App_KernelProdContainer
{
    /*
     * Gets the private 'doctrine.dbal.default_connection.event_manager' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\ContainerAwareEventManager
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['doctrine.dbal.default_connection.event_manager'] = new \Symfony\Bridge\Doctrine\ContainerAwareEventManager(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'vich_uploader.listener.clean.images' => ['privates', 'vich_uploader.listener.clean.images', 'getVichUploader_Listener_Clean_ImagesService', true],
            'vich_uploader.listener.clean.result_images' => ['privates', 'vich_uploader.listener.clean.result_images', 'getVichUploader_Listener_Clean_ResultImagesService', true],
            'doctrine.orm.listeners.doctrine_dbal_cache_adapter_schema_listener' => ['privates', 'doctrine.orm.listeners.doctrine_dbal_cache_adapter_schema_listener', 'getDoctrine_Orm_Listeners_DoctrineDbalCacheAdapterSchemaListenerService', true],
            'doctrine.orm.listeners.doctrine_token_provider_schema_listener' => ['privates', 'doctrine.orm.listeners.doctrine_token_provider_schema_listener', 'getDoctrine_Orm_Listeners_DoctrineTokenProviderSchemaListenerService', true],
            'doctrine.orm.listeners.pdo_session_handler_schema_listener' => ['privates', 'doctrine.orm.listeners.pdo_session_handler_schema_listener', 'getDoctrine_Orm_Listeners_PdoSessionHandlerSchemaListenerService', true],
            'doctrine.orm.listeners.lock_store_schema_listener' => ['privates', 'doctrine.orm.listeners.lock_store_schema_listener', 'getDoctrine_Orm_Listeners_LockStoreSchemaListenerService', true],
            'doctrine.orm.default_listeners.attach_entity_listeners' => ['privates', 'doctrine.orm.default_listeners.attach_entity_listeners', 'getDoctrine_Orm_DefaultListeners_AttachEntityListenersService', true],
            'vich_uploader.listener.inject.images' => ['privates', 'vich_uploader.listener.inject.images', 'getVichUploader_Listener_Inject_ImagesService', true],
            'vich_uploader.listener.remove.images' => ['privates', 'vich_uploader.listener.remove.images', 'getVichUploader_Listener_Remove_ImagesService', true],
            'vich_uploader.listener.upload.images' => ['privates', 'vich_uploader.listener.upload.images', 'getVichUploader_Listener_Upload_ImagesService', true],
            'vich_uploader.listener.inject.result_images' => ['privates', 'vich_uploader.listener.inject.result_images', 'getVichUploader_Listener_Inject_ResultImagesService', true],
            'vich_uploader.listener.remove.result_images' => ['privates', 'vich_uploader.listener.remove.result_images', 'getVichUploader_Listener_Remove_ResultImagesService', true],
            'vich_uploader.listener.upload.result_images' => ['privates', 'vich_uploader.listener.upload.result_images', 'getVichUploader_Listener_Upload_ResultImagesService', true],
        ], [
            'vich_uploader.listener.clean.images' => '?',
            'vich_uploader.listener.clean.result_images' => '?',
            'doctrine.orm.listeners.doctrine_dbal_cache_adapter_schema_listener' => '?',
            'doctrine.orm.listeners.doctrine_token_provider_schema_listener' => '?',
            'doctrine.orm.listeners.pdo_session_handler_schema_listener' => '?',
            'doctrine.orm.listeners.lock_store_schema_listener' => '?',
            'doctrine.orm.default_listeners.attach_entity_listeners' => '?',
            'vich_uploader.listener.inject.images' => '?',
            'vich_uploader.listener.remove.images' => '?',
            'vich_uploader.listener.upload.images' => '?',
            'vich_uploader.listener.inject.result_images' => '?',
            'vich_uploader.listener.remove.result_images' => '?',
            'vich_uploader.listener.upload.result_images' => '?',
        ]), [[['preUpdate'], 'vich_uploader.listener.clean.images'], [['preUpdate'], 'vich_uploader.listener.clean.result_images'], [['postGenerateSchema'], 'doctrine.orm.listeners.doctrine_dbal_cache_adapter_schema_listener'], [['postGenerateSchema'], 'doctrine.orm.listeners.doctrine_token_provider_schema_listener'], [['postGenerateSchema'], 'doctrine.orm.listeners.pdo_session_handler_schema_listener'], [['postGenerateSchema'], 'doctrine.orm.listeners.lock_store_schema_listener'], [['loadClassMetadata'], 'doctrine.orm.default_listeners.attach_entity_listeners'], [['postLoad'], 'vich_uploader.listener.inject.images'], [['preRemove'], 'vich_uploader.listener.remove.images'], [['postFlush'], 'vich_uploader.listener.remove.images'], [['prePersist'], 'vich_uploader.listener.upload.images'], [['preUpdate'], 'vich_uploader.listener.upload.images'], [['postLoad'], 'vich_uploader.listener.inject.result_images'], [['preRemove'], 'vich_uploader.listener.remove.result_images'], [['postFlush'], 'vich_uploader.listener.remove.result_images'], [['prePersist'], 'vich_uploader.listener.upload.result_images'], [['preUpdate'], 'vich_uploader.listener.upload.result_images']]);
    }
}
