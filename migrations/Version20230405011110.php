<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230405011110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scientist DROP FOREIGN KEY FK_E1774A61DB403044');
        $this->addSql('DROP INDEX IDX_E1774A61DB403044 ON scientist');
        $this->addSql('ALTER TABLE scientist DROP mentor_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scientist ADD mentor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scientist ADD CONSTRAINT FK_E1774A61DB403044 FOREIGN KEY (mentor_id) REFERENCES scientist (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E1774A61DB403044 ON scientist (mentor_id)');
    }
}
