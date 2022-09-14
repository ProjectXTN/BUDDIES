<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class RegistrationStep17 extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Activities',ChoiceType::class, [
            'multiple' => true, 
            'expanded' => true, 
            'choices'=>['Exposition '=> 'Exposition', 'Dégustation'=> 'Dégustation',' Sport'=> 'Sport', 'Découverte'=> 'Découverte', 'Randonnée'=> 'Randonnée', 'Bowling'=> 'Bowling', 'Pique-nique'=> 'Pique-nique', 'Jeux de société'=> 'Jeux de société']]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
