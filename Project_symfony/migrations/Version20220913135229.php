<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220913135229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD match_age_min INT DEFAULT NULL, ADD match_age_max INT DEFAULT NULL, ADD match_genre VARCHAR(255) DEFAULT NULL, ADD match_langue VARCHAR(255) DEFAULT NULL, ADD match_politique TINYINT(1) DEFAULT NULL, ADD match_break_the_ice VARCHAR(255) DEFAULT NULL, ADD match_perfect_afternoon VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP match_age_min, DROP match_age_max, DROP match_genre, DROP match_langue, DROP match_politique, DROP match_break_the_ice, DROP match_perfect_afternoon');
    }
}
