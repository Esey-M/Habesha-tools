<?php

namespace ContainerQZGZx3P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_Dbal_DefaultConnectionService extends App_KernelProdContainer
{
    /*
     * Gets the public 'doctrine.dbal.default_connection' shared service.
     *
     * @return \Doctrine\DBAL\Connection
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->privates['doctrine.dbal.default_connection.event_manager'] ?? $container->load('getDoctrine_Dbal_DefaultConnection_EventManagerService'));

        if (isset($container->services['doctrine.dbal.default_connection'])) {
            return $container->services['doctrine.dbal.default_connection'];
        }
        $b = new \Doctrine\DBAL\Configuration();
        $b->setSchemaManagerFactory(new \Doctrine\DBAL\Schema\LegacySchemaManagerFactory());
        $b->setSchemaAssetsFilter(new \Doctrine\Bundle\DoctrineBundle\Dbal\SchemaAssetsFilterManager([($container->privates['doctrine_migrations.schema_filter_listener'] ??= new \Doctrine\Bundle\MigrationsBundle\EventListener\SchemaFilterListener('doctrine_migration_versions'))]));
        $b->setMiddlewares([]);

        $container->services['doctrine.dbal.default_connection'] = $instance = (new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory([], new \Doctrine\DBAL\Tools\DsnParser(['db2' => 'ibm_db2', 'mssql' => 'pdo_sqlsrv', 'mysql' => 'pdo_mysql', 'mysql2' => 'pdo_mysql', 'postgres' => 'pdo_pgsql', 'postgresql' => 'pdo_pgsql', 'pgsql' => 'pdo_pgsql', 'sqlite' => 'pdo_sqlite', 'sqlite3' => 'pdo_sqlite'])))->createConnection(['url' => $container->getEnv('resolve:DATABASE_URL'), 'use_savepoints' => true, 'driver' => 'pdo_mysql', 'idle_connection_ttl' => 600, 'host' => 'localhost', 'port' => NULL, 'user' => 'root', 'password' => NULL, 'driverOptions' => [], 'defaultTableOptions' => []], $b, $a, []);

        $instance->setNestTransactionsWithSavepoints(true);

        return $instance;
    }
}
