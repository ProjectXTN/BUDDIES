<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220908083951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publication ADD groupe_id INT NOT NULL');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67797A45358C FOREIGN KEY (groupe_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_AF3C67797A45358C ON publication (groupe_id)');
        $this->addSql('ALTER TABLE user CHANGE isconnected isconnected DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67797A45358C');
        $this->addSql('DROP INDEX IDX_AF3C67797A45358C ON publication');
        $this->addSql('ALTER TABLE publication DROP groupe_id');
        $this->addSql('ALTER TABLE user CHANGE isconnected isconnected DATE DEFAULT NULL');
    }
}
