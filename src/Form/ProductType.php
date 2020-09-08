<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image')
            ->add('barcode')
            ->add('name')
            ->add('description')
            ->add('inventaryMin')
            ->add('priceIn')
            ->add('priceOut')
            ->add('unit')
            ->add('presentation')
            ->add('createdAt')
            ->add('isActive')
            ->add('providerId')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
