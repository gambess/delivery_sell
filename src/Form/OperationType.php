<?php

namespace App\Form;

use App\Entity\Operation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OperationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('inStock')
            ->add('q')
            ->add('priceIn')
            ->add('priceOut')
            ->add('priceInp')
            ->add('categoryId')
            ->add('status')
            ->add('createdAt')
            ->add('product')
            ->add('operationType')
            ->add('sell')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Operation::class,
        ]);
    }
}
