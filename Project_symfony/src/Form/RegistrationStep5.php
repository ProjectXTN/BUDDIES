<?php

namespace App\Form;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationStep5 extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('genre', ChoiceType::class, ['multiple' => false, 'expanded' => true, 'choices'=>['Femme'=> 'Femme', 'Homme'=> 'Homme','Agenre'=> 'Agenre','Bigenre'=> 'Bigenre', 'Genre Fluide'=> 'Genre Fluide', 'Genderqueer'=> 'Genderqueer', 'Genre non conforme'=> 'Genre non conforme', 'Intersexe'=> 'Intersexe', 'Non binaire'=> 'Non binaire', 'Autre'=> 'Autre', 'Pangenre'=> 'Pangenre','Transféminin'=> 'Transféminin', 'Transgenre'=>'Transgenre', 'Hommes trans' => 'Hommes trans', 'Transmaculin' => 'Transmaculin', 'Transsexuel' => 'Transsexuel', 'Femme trans' => 'Femme trans']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
