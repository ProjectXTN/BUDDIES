<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class RegistrationStep16 extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Interets',ChoiceType::class, [
            'multiple' => false, 
            'expanded' => true, 
            'choices'=>['Cinema '=> 'Cinema', 'Musique'=> 'Musique',' Sport'=> 'Sport', 'Cuisine'=> 'Cuisine', 'Art'=> 'Art', 'Lecture'=> 'Lecture', 'Photo'=> 'Photo', 'Jeux'=> 'Jeux', 'Visite'=> 'Visite']]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
