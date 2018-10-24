<?php

namespace App\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CardType.
 *
 * @author Romain
 */
class CardType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userId', TextType::class, ['required' => true])
            ->add('type', TextType::class, ['required' => true])
            ->add('numbers', TextType::class, ['required' => true])
            ->add('company', TextType::class, ['required' => true])
            ->add('isActive', CheckboxType::class, ['required' => true])
            ->add('expireAt', DateTimeType::class, ['required' => true, 'widget' => 'single_text'])
            ->add('country', TextType::class, ['required' => true])
            ->add('balance', NumberType::class, ['required' => true])
            ->add('currency', TextType::class, ['required' => true]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'App\Entity\Card',
                'csrf_protection' => false,
            ]
        );
    }
}
