<?php

namespace App\Form;

use App\Entity\Sell;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SellType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('refId')
            ->add('deliveredBy')
            ->add('invoice')
            ->add('paymentType')
            ->add('total')
            ->add('cash')
            ->add('iva')
            ->add('discount')
            ->add('status')
            ->add('createdAt')
            ->add('operationType')
            ->add('user')
            ->add('person')
            ->add('paymentMethod')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sell::class,
        ]);
    }
}
