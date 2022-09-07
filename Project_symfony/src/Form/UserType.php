<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            //->add('roles')
            //->add('password', PasswordType::class)
            ->add('firstName')
            ->add('lastName')
            ->add('country',ChoiceType::class,['choices'=>['Afghanistan'=> 'AF', 'Îles Åland'=> 'AX','Algérie'=> 'DZ','Angola'=> 'AO', 'Argentine'=> 'AR', 'Arménie'=> 'AM', 'Australie'=> 'AU', 'Bahamas'=> 'BS', 'Bangladesh'=> 'BD', 'Biélorussie'=> 'BY', 'Belgique'=> 'BE','Bolivie'=> 'BO', 'Brazil'=>'BR', 'Bulgarie' => 'BG','Cambodge'=> 'KH', 'Cameroun'=> 'CM','Canada'=> 'CA','Cap-Vert'=> 'CV', 'Iles Cayman'=> 'KY', 'Chili'=> 'CL', 'Chine'=> 'CN', 'Hong Kong'=> 'HK', 'Colombie'=> 'CO', 'Comores'=> 'KM', 'République du Congo'=> 'CG','Costa Rica'=> 'CR', 'Côte d’Ivoire'=>'CI', 'Croatie' => 'HR', 'Cuba'=> 'CU', 'République tchèque'=> 'CZ','Danemark'=> 'DK','République dominicaine'=> 'DO', 'Équateur'=> 'EC', 'Égypte'=> 'EG', 'Salvador'=> 'SV', 'Estonie'=> 'EE', 'Éthiopie'=> 'ET', 'Fidji'=> 'FJ', 'Finlande'=> 'FI','France'=> 'FR', 'Guyane française'=>'GF', 'Polynésie française' => 'PF','Géorgie'=> 'GE', 'Allemagne'=> 'DE','Grèce'=> 'GR','Groenland'=> 'GL', 'Guadeloupe'=> 'GP', 'Guatemala'=> 'GT', 'Haïti'=> 'HT', 'Honduras'=> 'HN', 'Hongrie'=> 'HU', 'Islande'=> 'IS', 'Inde'=> 'IN','Indonésie'=> 'ID', 'Iran'=>'IR', 'Irak' => 'IQ', 'Israël'=> 'IL', 'Italie'=> 'IT', 'Jamaïque'=> 'JM','Japon'=> 'JP', 'Jordanie'=> 'JO', 'Corée du Nord'=> 'KP', 'Corée du Sud'=> 'KR', 'Liban'=> 'LB', 'Lituanie'=> 'LT', 'Luxembourg'=> 'LU', 'Madagascar'=> 'MG','Maldives'=> 'MV', 'Martinique'=>'MQ', 'Mexique' => 'MX','Monaco'=> 'MC', 'Mongolie'=> 'MN','Mozambique'=> 'MZ','Pays-Bas'=> 'NL', 'Nigeria'=> 'NG', 'Norvège'=> 'NO', 'Pakistan'=> 'PK', 'Palestine'=> 'PS', 'Panama'=> 'PA', 'Paraguay'=> 'PY', 'Pérou'=> 'PE','Pologne'=> 'PL', 'Portugal'=>'PT', 'Roumanie' => 'RO', 'Russie'=> 'RU', 'Arabie Saoudite'=> 'SA','Sénégal'=> 'SN','Serbie'=> 'RS', 'Singapour'=> 'SG', 'Égypte'=> 'EG', 'Salvador'=> 'SV', 'Estonie'=> 'EE', 'Éthiopie'=> 'ET', 'Fidji'=> 'FJ', 'Finlande'=> 'FI','France'=> 'FR', 'Guyane française'=>'GF', 'Polynésie Slovaquie' => 'SK','Afrique du Sud'=> 'ZA', 'Espagne'=> 'ES','Sri Lanka'=> 'LK','Suède'=> 'SE', 'Suisse'=> 'CH', 'Taiwan'=> 'TW', 'Thaïlande'=> 'TH', 'Tunisie'=> 'TN', 'Turquie'=> 'TR', 'Ukraine'=> 'UA', 'États-Unis'=> 'US','Royaume-Uni'=> 'GB', 'Uruguay'=>'UY', 'Venezuela' => 'VE', 'Viêt Nam'=> 'VN','Sahara occidental'=> 'EH', 'Zambie'=>'ZM', 'Zimbabwe' => 'ZW']])
            ->add('city',ChoiceType::class,['choices'=>['Paris'=> 'Paris', 'Marseille'=> 'Marseille', 'Toulouse'=> 'Toulouse', 'Nice'=> 'Nice', 'Nantes'=> 'Nantes', 'Montpellier'=> 'Montpellier', 'Strasbourg'=> 'Strasbourg', 'Bordeaux'=> 'Bordeaux', 'Lille'=> 'Lille']])
            ->add('language',ChoiceType::class, ['choices'=>['Francais'=> 'fra', 'Anglais'=> 'eng','Portugais'=> 'por','Japonais'=> 'jpn', 'Espagnol'=> 'spa', 'Italien'=> 'ita', 'Russe'=> 'rus', 'Allemand'=> 'deu', 'Irlandais'=> 'gle', 'Créole haïtien'=> 'hat', 'Arménien'=> 'hye','Coréen'=> 'kor', 'Polonais'=>'pol', 'Suédois' => 'swe']])
            ->add('Picture', FileType::class, ['constraints' => [
                new File([
                    'maxSize' => '1024k',
                    'mimeTypes' => [
                        'application/pdf',
                        'application/x-pdf',
                        'image/jpeg',
                        'image/jpg',
                        'image/pgn',
                    ]])],
                    'data_class' => null])
            ->add('Biography')
            ->add('isExpat')
            //->add('created_at')
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
