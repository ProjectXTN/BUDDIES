<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class RegistrationStep7 extends AbstractType
{

    const tabLanguage = ['Francais'=> 'Francais', 'Anglais'=> 'Anglais','Portugais'=> 'Portugais','Japonais'=> 'Japonais', 'Espagnol'=> 'Espagnol', 'Italien'=> 'Italien', 'Russe'=> 'Russe', 'Allemand'=> 'Allemand', 'Irlandais'=> 'Irlandais', 'Créole haïtien'=> 'Créole haïtien', 'Arménien'=> 'Arménien','Coréen'=> 'Coréen', 'Polonais'=>'Polonais', 'Suédois' => 'Suédois', 'Corse' => 'Corse', 'Écossais' => 'Écossais', 'Nederlands' => 'Nederlands', 'Slovaque' => 'Slovaque', 'Ukrainien' => 'Ukrainien'];

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('language',ChoiceType::class, ['choices' => self::tabLanguage,
        'expanded' => false,
        'multiple' => true,
        'required' => false,
        'data' => self::tabLanguage])
         ->add('country',ChoiceType::class,['choices'=>['Brazil'=>'Brazil','Afghanistan'=> 'Afghanistan', 'Îles Åland'=> 'Îles Åland','Algérie'=> 'Algérie','Angola'=> 'Angola', 'Argentine'=> 'Argentine', 'Arménie'=> 'Arménie', 'Australie'=> 'Australie', 'Bahamas'=> 'Bahamas', 'Bangladesh'=> 'Bangladesh', 'Biélorussie'=> 'Biélorussie', 'Belgique'=> 'Belgique','Bolivie'=> 'Bolivie', 'Brazil'=>'Brazil', 'Bulgarie' => 'Bulgarie','Cambodge'=> 'Cambodge', 'Cameroun'=> 'Cameroun','Canada'=> 'Canada','Cap-Vert'=> 'ap-Vert', 'Iles Cayman'=> 'Iles Cayman', 'Chili'=> 'Chili', 'Chine'=> 'Chine', 'Hong Kong'=> 'Hong', 'Colombie'=> 'Colombie', 'Comores'=> 'Comores', 'République du Congo'=> 'République du Congo','Costa Rica'=> 'Costa Rica', 'Côte d’Ivoire'=>'Côte d’Ivoire', 'Croatie' => 'Croatie', 'Cuba'=> 'Cuba', 'République tchèque'=> 'République tchèque','Danemark'=> 'Danemark','République dominicaine'=> 'République dominicaine', 'Équateur'=> 'Équateur', 'Égypte'=> 'Égypte', 'Salvador'=> 'Salvador', 'Estonie'=> 'Estonie', 'Éthiopie'=> 'Éthiopie', 'Fidji'=> 'Fidji', 'Finlande'=> 'Finlande','France'=> 'France', 'Guyane française'=>'Guyane française', 'Polynésie française' => 'Polynésie française','Géorgie'=> 'Géorgie', 'Allemagne'=> 'Allemagne','Grèce'=> 'Grèce','Groenland'=> 'Groenland', 'Guadeloupe'=> 'Guadeloupe', 'Guatemala'=> 'Guatemala', 'Haïti'=> 'Haïti', 'Honduras'=> 'Honduras', 'Hongrie'=> 'Hongrie', 'Islande'=> 'Islande', 'Inde'=> 'Inde','Indonésie'=> 'Indonésie', 'Iran'=>'Iran', 'Irak' => 'Irak', 'Israël'=> 'Israël', 'Italie'=> 'Italie', 'Jamaïque'=> 'Jamaïque','Japon'=> 'Japon', 'Jordanie'=> 'Jordanie', 'Corée du Nord'=> 'Corée du Nord', 'Corée du Sud'=> 'Corée du Sud', 'Liban'=> 'Liban', 'Lituanie'=> 'Lituanie', 'Luxembourg'=> 'Luxembourg', 'Madagascar'=> 'Madagascar','Maldives'=> 'Maldives', 'Martinique'=>'Martinique', 'Mexique' => 'Mexique','Monaco'=> 'Monaco', 'Mongolie'=> 'Mongolie','Mozambique'=> 'Mozambique','Pays-Bas'=> 'Pays-Bas', 'Nigeria'=> 'Nigeria', 'Norvège'=> 'Norvège', 'Pakistan'=> 'Pakistan', 'Palestine'=> 'Palestine', 'Panama'=> 'Panama', 'Paraguay'=> 'Paraguay', 'Pérou'=> 'Pérou','Pologne'=> 'Pologne', 'Portugal'=>'Portugal', 'Roumanie' => 'Roumanie', 'Russie'=> 'Russie', 'Arabie Saoudite'=> 'Arabie Saoudite','Sénégal'=> 'Sénégal','Serbie'=> 'Serbie', 'Singapour'=> 'Singapour', 'Égypte'=> 'Égypte', 'Salvador'=> 'Salvador', 'Estonie'=> 'Estonie', 'Éthiopie'=> 'Éthiopie', 'Fidji'=> 'Fidji', 'Finlande'=> 'Finlande','France'=> 'France', 'Guyane française'=>'Guyane française', 'Polynésie Slovaquie' => 'Polynésie Slovaquie','Afrique du Sud'=> 'Afrique du Sud', 'Espagne'=> 'Espagne','Sri Lanka'=> 'Sri Lanka','Suède'=> 'Suède', 'Suisse'=> 'Suisse', 'Taiwan'=> 'Taiwan', 'Thaïlande'=> 'Thaïlande', 'Tunisie'=> 'Tunisie', 'Turquie'=> 'Turquie', 'Ukraine'=> 'Ukraine', 'États-Unis'=> 'États-Unis','Royaume-Uni'=> 'Royaume-Uni', 'Uruguay'=>'Uruguay', 'Venezuela' => 'Venezuela', 'Viêt Nam'=> 'Viêt Nam','Sahara occidental'=> 'Sahara occidental', 'Zambie'=>'Zambie', 'Zimbabwe' => 'Zimbabwe']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
