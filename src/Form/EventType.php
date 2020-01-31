<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Actor;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Date')
            ->add('capacity')
            ->add('place')
            ->add('eventImage')
            ->add('description')
            ->add('actors', EntityType::class, [
                'class' => Actor::class,
                'choice_label' => 'name',
                'multiple' => true,
                'by_reference' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
