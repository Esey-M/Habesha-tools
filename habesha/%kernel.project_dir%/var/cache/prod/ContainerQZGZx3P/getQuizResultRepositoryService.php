<?php

namespace ContainerQZGZx3P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getQuizResultRepositoryService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Repository\QuizResultRepository' shared autowired service.
     *
     * @return \App\Repository\QuizResultRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Repository\\QuizResultRepository'] = new \App\Repository\QuizResultRepository(($container->services['doctrine'] ?? $container->load('getDoctrineService')));
    }
}
