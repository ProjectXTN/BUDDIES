<?php

namespace App\Controller\Admin;

use App\Entity\User;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\LanguageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;


class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email'),
            TextField::new('firstName'),
            TextField::new('lastName'),
            TextField::new('password'),
            DateTimeField::new('created_at'),
            ChoiceField::new('city')->setChoices([
                'Paris' => 'Paris',
                'Marseille' => 'Marseille',
                'Toulouse' => 'Toulouse',
                'Nice' => 'Nice',
                'Nantes' => 'Nantes',
                'Montpellier' => 'Montpellier',
                'Strasbourg' => 'Strasbourg',
                'Lille' => 'Lille',
            ]),
            CountryField::new('country'),
            ChoiceField::new('language')->setChoices([
                'Francais' => 'Francais',
                'Anglais' => 'Anglais',
                'Portugais' => 'Portugais',
                'Japonais' => 'Japonais',
                'Italien' => 'Italien',
                'Russe' => 'Russe',
                'Allemand' => 'Allemand',
                'Irlandais' => 'Irlandais',
                'Créole haïtien' => 'Créole haïtien',
                'Arménien' => 'Arménien',
                'Coréen' => 'Coréen',
                'Polonais' => 'Polonais',
                'Suédois' => 'Suédois',
                'Corse' => 'Corse',
                'Écossais' => 'Écossais',
                'Slovaque' => 'Slovaque',
                'Ukrainien' => 'Ukrainien',
            ]),
            ChoiceField::new('language2')->setChoices([
                'Francais' => 'Francais',
                'Anglais' => 'Anglais',
                'Portugais' => 'Portugais',
                'Japonais' => 'Japonais',
                'Italien' => 'Italien',
                'Russe' => 'Russe',
                'Allemand' => 'Allemand',
                'Irlandais' => 'Irlandais',
                'Créole haïtien' => 'Créole haïtien',
                'Arménien' => 'Arménien',
                'Coréen' => 'Coréen',
                'Polonais' => 'Polonais',
                'Suédois' => 'Suédois',
                'Corse' => 'Corse',
                'Écossais' => 'Écossais',
                'Slovaque' => 'Slovaque',
                'Ukrainien' => 'Ukrainien',
            ]),
            ChoiceField::new('language3')->setChoices([
                'Francais' => 'Francais',
                'Anglais' => 'Anglais',
                'Portugais' => 'Portugais',
                'Japonais' => 'Japonais',
                'Italien' => 'Italien',
                'Russe' => 'Russe',
                'Allemand' => 'Allemand',
                'Irlandais' => 'Irlandais',
                'Créole haïtien' => 'Créole haïtien',
                'Arménien' => 'Arménien',
                'Coréen' => 'Coréen',
                'Polonais' => 'Polonais',
                'Suédois' => 'Suédois',
                'Corse' => 'Corse',
                'Écossais' => 'Écossais',
                'Slovaque' => 'Slovaque',
                'Ukrainien' => 'Ukrainien',
            ]),
            //LanguageField::new('language')->useAlpha3Codes(),
            //LanguageField::new('language2')->useAlpha3Codes(),
            //LanguageField::new('language3')->useAlpha3Codes(),
            BooleanField::new('is_expat')->renderAsSwitch(false),
            TextEditorField::new('biography')->setNumOfRows(15),
            ChoiceField::new('roles')->setChoices([
                'Utilisateur' => 'ROLE_USER',
                'Moderateur' => 'ROLE_MODERATOR',
                'Administrateur' => 'ROLE_ADMINISTRATOR'
            ])->allowMultipleChoices()
        ];
    }
    
}
