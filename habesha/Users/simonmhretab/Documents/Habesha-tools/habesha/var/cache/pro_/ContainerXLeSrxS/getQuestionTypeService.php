<?php

namespace ContainerXLeSrxS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getQuestionTypeService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Form\QuestionType' shared autowired service.
     *
     * @return \App\Form\QuestionType
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Form\\QuestionType'] = new \App\Form\QuestionType();
    }
}
