<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220908114658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD review_sender_id INT DEFAULT NULL, ADD review_received_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64961D5289C FOREIGN KEY (review_sender_id) REFERENCES review (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C6E70989 FOREIGN KEY (review_received_id) REFERENCES review (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64961D5289C ON user (review_sender_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649C6E70989 ON user (review_received_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64961D5289C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C6E70989');
        $this->addSql('DROP INDEX IDX_8D93D64961D5289C ON user');
        $this->addSql('DROP INDEX IDX_8D93D649C6E70989 ON user');
        $this->addSql('ALTER TABLE user DROP review_sender_id, DROP review_received_id');
    }
}
