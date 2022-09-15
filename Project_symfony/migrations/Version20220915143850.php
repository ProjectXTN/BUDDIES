<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220915143850 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A80233D34C1');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A803AD8644E');
        $this->addSql('DROP TABLE user_user');
        $this->addSql('ALTER TABLE activitie ADD step INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD genre VARCHAR(255) DEFAULT NULL, ADD birth_date DATE DEFAULT NULL, ADD match_age_min INT DEFAULT NULL, ADD match_age_max INT DEFAULT NULL, ADD match_genre VARCHAR(255) DEFAULT NULL, ADD match_langue VARCHAR(255) DEFAULT NULL, ADD match_politique TINYINT(1) DEFAULT NULL, ADD match_break_the_ice VARCHAR(255) DEFAULT NULL, ADD match_perfect_afternoon VARCHAR(255) DEFAULT NULL, ADD activities VARCHAR(255) DEFAULT NULL, ADD interets VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_user (user_source INT NOT NULL, user_target INT NOT NULL, INDEX IDX_F7129A803AD8644E (user_source), INDEX IDX_F7129A80233D34C1 (user_target), PRIMARY KEY(user_source, user_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A80233D34C1 FOREIGN KEY (user_target) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A803AD8644E FOREIGN KEY (user_source) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activitie DROP step');
        $this->addSql('ALTER TABLE user DROP genre, DROP birth_date, DROP match_age_min, DROP match_age_max, DROP match_genre, DROP match_langue, DROP match_politique, DROP match_break_the_ice, DROP match_perfect_afternoon, DROP activities, DROP interets');
    }
}
