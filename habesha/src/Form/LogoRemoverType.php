<?php

namespace App\Form;

use App\Entity\ImageProcess;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class LogoRemoverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', VichImageType::class, [
                'required' => true,
                'allow_delete' => false,
                'delete_label' => 'Delete image',
                'download_uri' => false,
                'image_uri' => true,
                'asset_helper' => true,
                'attr' => [
                    'class' => 'form-control',
                    'accept' => 'image/*'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ImageProcess::class,
        ]);
    }
} 