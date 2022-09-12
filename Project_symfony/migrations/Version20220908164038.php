<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220908164038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activitie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activitie_user (id INT AUTO_INCREMENT NOT NULL, activitie_id INT DEFAULT NULL, user_id INT DEFAULT NULL, is_activitie TINYINT(1) NOT NULL, INDEX IDX_C8B28E4EB0ED4F5 (activitie_id), INDEX IDX_C8B28E4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, receiver_id INT NOT NULL, text LONGTEXT NOT NULL, sent_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', received_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_E22A4301F624B39D (sender_id), INDEX IDX_E22A4301CD53EDB6 (receiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activitie_user ADD CONSTRAINT FK_C8B28E4EB0ED4F5 FOREIGN KEY (activitie_id) REFERENCES activitie (id)');
        $this->addSql('ALTER TABLE activitie_user ADD CONSTRAINT FK_C8B28E4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE messenger ADD CONSTRAINT FK_E22A4301F624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE messenger ADD CONSTRAINT FK_E22A4301CD53EDB6 FOREIGN KEY (receiver_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_review DROP FOREIGN KEY FK_1C119AFBA76ED395');
        $this->addSql('ALTER TABLE user_review DROP FOREIGN KEY FK_1C119AFB3E2E969B');
        $this->addSql('DROP TABLE user_review');
        $this->addSql('ALTER TABLE `group` DROP FOREIGN KEY FK_6DC044C538B217A7');
        $this->addSql('DROP INDEX IDX_6DC044C538B217A7 ON `group`');
        $this->addSql('ALTER TABLE `group` ADD image VARCHAR(255) DEFAULT NULL, DROP publication_id');
        $this->addSql('ALTER TABLE publication ADD groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67797A45358C FOREIGN KEY (groupe_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_AF3C67797A45358C ON publication (groupe_id)');
        $this->addSql('ALTER TABLE user ADD isconnected DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_review (user_id INT NOT NULL, review_id INT NOT NULL, INDEX IDX_1C119AFBA76ED395 (user_id), INDEX IDX_1C119AFB3E2E969B (review_id), PRIMARY KEY(user_id, review_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_review ADD CONSTRAINT FK_1C119AFBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_review ADD CONSTRAINT FK_1C119AFB3E2E969B FOREIGN KEY (review_id) REFERENCES review (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activitie_user DROP FOREIGN KEY FK_C8B28E4EB0ED4F5');
        $this->addSql('ALTER TABLE activitie_user DROP FOREIGN KEY FK_C8B28E4A76ED395');
        $this->addSql('ALTER TABLE messenger DROP FOREIGN KEY FK_E22A4301F624B39D');
        $this->addSql('ALTER TABLE messenger DROP FOREIGN KEY FK_E22A4301CD53EDB6');
        $this->addSql('DROP TABLE activitie');
        $this->addSql('DROP TABLE activitie_user');
        $this->addSql('DROP TABLE messenger');
        $this->addSql('ALTER TABLE `group` ADD publication_id INT NOT NULL, DROP image');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C538B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('CREATE INDEX IDX_6DC044C538B217A7 ON `group` (publication_id)');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67797A45358C');
        $this->addSql('DROP INDEX IDX_AF3C67797A45358C ON publication');
        $this->addSql('ALTER TABLE publication DROP groupe_id');
        $this->addSql('ALTER TABLE user DROP isconnected');
    }
}
