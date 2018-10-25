<?php

namespace App\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class LocationType.
 */
class LocationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['required' => true])
            ->add('address', TextType::class, ['required' => true])
            ->add('postalCode', TextType::class, ['required' => true])
            ->add('locality', TextType::class, ['required' => true])
            ->add('houseNumber', TextType::class, ['required' => true])
            ->add('website', TextType::class, ['required' => true])
            ->add('email', TextType::class, ['required' => true])
            ->add('phoneNumber', TextType::class, ['required' => true])
            ->add('phoneNumberBis', TextType::class, ['required' => false])
            ->add('wifi', CheckboxType::class, ['required' => false]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'App\Entity\Location',
                'csrf_protection' => false,
            ]
        );
    }
}
