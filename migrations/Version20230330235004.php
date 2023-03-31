<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230330235004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mentor (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE scientist ADD mentor_sc_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scientist ADD CONSTRAINT FK_E1774A61FCF200E FOREIGN KEY (mentor_sc_id) REFERENCES mentor (id)');
        $this->addSql('CREATE INDEX IDX_E1774A61FCF200E ON scientist (mentor_sc_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scientist DROP FOREIGN KEY FK_E1774A61FCF200E');
        $this->addSql('DROP TABLE mentor');
        $this->addSql('DROP INDEX IDX_E1774A61FCF200E ON scientist');
        $this->addSql('ALTER TABLE scientist DROP mentor_sc_id');
    }
}
