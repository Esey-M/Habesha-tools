<?php

namespace ContainerXLeSrxS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCreateTestQuizCommandService extends App_KernelProdContainer
{
    /*
     * Gets the public 'console.command.public_alias.App\Command\CreateTestQuizCommand' shared autowired service.
     *
     * @return \App\Command\CreateTestQuizCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['console.command.public_alias.App\\Command\\CreateTestQuizCommand'] = new \App\Command\CreateTestQuizCommand(($container->services['doctrine.orm.default_entity_manager'] ?? $container->load('getDoctrine_Orm_DefaultEntityManagerService')));
    }
}
