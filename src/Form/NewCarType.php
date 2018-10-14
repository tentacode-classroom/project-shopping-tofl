<?php

namespace App\Form;

use App\Entity\Car;
#use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class NewCarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', TextType::class, [
                'label' => 'Modèle'
            ])
            ->add('nbSeats', NumberType::class, [
                'label' => 'Nombre de places'
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description'
            ])
            ->add('year', NumberType::class, [
                'label' => 'Année'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Ajouter'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
