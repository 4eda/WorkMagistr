<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230405235720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE student_mentor (student_id INT NOT NULL, mentor_id INT NOT NULL, INDEX IDX_E23BA5ECB944F1A (student_id), INDEX IDX_E23BA5EDB403044 (mentor_id), PRIMARY KEY(student_id, mentor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student_mentor ADD CONSTRAINT FK_E23BA5ECB944F1A FOREIGN KEY (student_id) REFERENCES scientist (id)');
        $this->addSql('ALTER TABLE student_mentor ADD CONSTRAINT FK_E23BA5EDB403044 FOREIGN KEY (mentor_id) REFERENCES scientist (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_mentor DROP FOREIGN KEY FK_E23BA5ECB944F1A');
        $this->addSql('ALTER TABLE student_mentor DROP FOREIGN KEY FK_E23BA5EDB403044');
        $this->addSql('DROP TABLE student_mentor');
    }
}
