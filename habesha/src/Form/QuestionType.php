<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('questionText', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'rows' => 2]
            ])
            ->add('options', CollectionType::class, [
                'entry_type' => TextareaType::class,
                'entry_options' => [
                    'attr' => ['class' => 'form-control']
                ],
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'attr' => ['class' => 'options-collection']
            ])
            ->add('correctOption', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'min' => 0]
            ])
            ->add('orderNumber', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'min' => 1]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
} 