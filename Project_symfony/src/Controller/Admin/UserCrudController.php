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
            // il faut ajouter d'autres langue
            LanguageField::new('language')->useAlpha3Codes(),
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
