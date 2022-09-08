<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220908115207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE review ADD sender_id_id INT DEFAULT NULL, ADD received_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C66061F7CF FOREIGN KEY (sender_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6BA2E6344 FOREIGN KEY (received_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_794381C66061F7CF ON review (sender_id_id)');
        $this->addSql('CREATE INDEX IDX_794381C6BA2E6344 ON review (received_id_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64961D5289C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C6E70989');
        $this->addSql('DROP INDEX IDX_8D93D649C6E70989 ON user');
        $this->addSql('DROP INDEX IDX_8D93D64961D5289C ON user');
        $this->addSql('ALTER TABLE user DROP review_sender_id, DROP review_received_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C66061F7CF');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6BA2E6344');
        $this->addSql('DROP INDEX IDX_794381C66061F7CF ON review');
        $this->addSql('DROP INDEX IDX_794381C6BA2E6344 ON review');
        $this->addSql('ALTER TABLE review DROP sender_id_id, DROP received_id_id');
        $this->addSql('ALTER TABLE user ADD review_sender_id INT DEFAULT NULL, ADD review_received_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64961D5289C FOREIGN KEY (review_sender_id) REFERENCES review (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C6E70989 FOREIGN KEY (review_received_id) REFERENCES review (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649C6E70989 ON user (review_received_id)');
        $this->addSql('CREATE INDEX IDX_8D93D64961D5289C ON user (review_sender_id)');
    }
}
