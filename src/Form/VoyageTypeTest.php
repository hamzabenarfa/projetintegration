<?php

namespace App\Form;

use App\Entity\Voyage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyageTypeTest extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prix')
            ->add('img_src')
            ->add('dest_title')
            ->add('location')
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voyage::class,
        ]);
    }
}
