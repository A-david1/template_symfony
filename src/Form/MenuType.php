<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Shift;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startedAt', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('finishedAt', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('shifts', CollectionType::class, [
                'entry_type'   => ShiftType::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
        ]);
    }
}
