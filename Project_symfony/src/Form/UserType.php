<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles', ChoiceType::class, [
                'choices'  => [
                    'Utilisateur' => 'ROLE_USER',
                    'Moderateur' => 'ROLE_MODERATOR',
                    'Administrateur' => 'ROLE_ADMINISTRATOR'
                ],
                'multiple' => true
            ])
            ->add('password')
            ->add('firstName')
            ->add('lastName')
            ->add('country')
            ->add('city')
            ->add('language')
            ->add('Picture')
            ->add('Biography')
            ->add('isExpat')
            ->add('created_at')
            //->add('groupe')
            //->add('Publication')
            //->add('Form')
            //->add('Reviews')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
