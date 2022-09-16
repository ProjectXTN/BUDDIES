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
            ChoiceField::new('country')->setChoices(['Afghanistan'=> 'Afghanistan', 'Îles Åland'=> 'Îles Åland','Algérie'=> 'Algérie','Angola'=> 'Angola', 'Argentine'=> 'Argentine', 'Arménie'=> 'Arménie', 'Australie'=> 'Australie', 'Bahamas'=> 'Bahamas', 'Bangladesh'=> 'Bangladesh', 'Biélorussie'=> 'Biélorussie', 'Belgique'=> 'Belgique','Bolivie'=> 'Bolivie', 'Brazil'=>'Brazil', 'Bulgarie' => 'Bulgarie','Cambodge'=> 'Cambodge', 'Cameroun'=> 'Cameroun','Canada'=> 'Canada','Cap-Vert'=> 'ap-Vert', 'Iles Cayman'=> 'Iles Cayman', 'Chili'=> 'Chili', 'Chine'=> 'Chine', 'Hong Kong'=> 'Hong', 'Colombie'=> 'Colombie', 'Comores'=> 'Comores', 'République du Congo'=> 'République du Congo','Costa Rica'=> 'Costa Rica', 'Côte d’Ivoire'=>'Côte d’Ivoire', 'Croatie' => 'Croatie', 'Cuba'=> 'Cuba', 'République tchèque'=> 'République tchèque','Danemark'=> 'Danemark','République dominicaine'=> 'République dominicaine', 'Équateur'=> 'Équateur', 'Égypte'=> 'Égypte', 'Salvador'=> 'Salvador', 'Estonie'=> 'Estonie', 'Éthiopie'=> 'Éthiopie', 'Fidji'=> 'Fidji', 'Finlande'=> 'Finlande','France'=> 'France', 'Guyane française'=>'Guyane française', 'Polynésie française' => 'Polynésie française','Géorgie'=> 'Géorgie', 'Allemagne'=> 'Allemagne','Grèce'=> 'Grèce','Groenland'=> 'Groenland', 'Guadeloupe'=> 'GP', 'Guatemala'=> 'GT', 'Haïti'=> 'HT', 'Honduras'=> 'HN', 'Hongrie'=> 'HU', 'Islande'=> 'IS', 'Inde'=> 'IN','Indonésie'=> 'ID', 'Iran'=>'IR', 'Irak' => 'IQ', 'Israël'=> 'IL', 'Italie'=> 'IT', 'Jamaïque'=> 'JM','Japon'=> 'JP', 'Jordanie'=> 'JO', 'Corée du Nord'=> 'KP', 'Corée du Sud'=> 'KR', 'Liban'=> 'LB', 'Lituanie'=> 'LT', 'Luxembourg'=> 'LU', 'Madagascar'=> 'MG','Maldives'=> 'MV', 'Martinique'=>'MQ', 'Mexique' => 'MX','Monaco'=> 'MC', 'Mongolie'=> 'MN','Mozambique'=> 'MZ','Pays-Bas'=> 'NL', 'Nigeria'=> 'NG', 'Norvège'=> 'NO', 'Pakistan'=> 'PK', 'Palestine'=> 'PS', 'Panama'=> 'PA', 'Paraguay'=> 'PY', 'Pérou'=> 'PE','Pologne'=> 'PL', 'Portugal'=>'PT', 'Roumanie' => 'RO', 'Russie'=> 'RU', 'Arabie Saoudite'=> 'SA','Sénégal'=> 'SN','Serbie'=> 'RS', 'Singapour'=> 'SG', 'Égypte'=> 'EG', 'Salvador'=> 'SV', 'Estonie'=> 'EE', 'Éthiopie'=> 'ET', 'Fidji'=> 'FJ', 'Finlande'=> 'FI','France'=> 'FR', 'Guyane française'=>'GF', 'Polynésie Slovaquie' => 'SK','Afrique du Sud'=> 'ZA', 'Espagne'=> 'ES','Sri Lanka'=> 'LK','Suède'=> 'SE', 'Suisse'=> 'CH', 'Taiwan'=> 'TW', 'Thaïlande'=> 'TH', 'Tunisie'=> 'TN', 'Turquie'=> 'TR', 'Ukraine'=> 'UA', 'États-Unis'=> 'US','Royaume-Uni'=> 'GB', 'Uruguay'=>'UY', 'Venezuela' => 'VE', 'Viêt Nam'=> 'VN','Sahara occidental'=> 'EH', 'Zambie'=>'ZM', 'Zimbabwe' => 'ZW']),
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
