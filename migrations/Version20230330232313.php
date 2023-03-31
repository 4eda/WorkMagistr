<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230330232313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE students_scientist DROP FOREIGN KEY FK_CDB21B8D1AD8D010');
        $this->addSql('ALTER TABLE students_scientist DROP FOREIGN KEY FK_CDB21B8DEBA327D6');
        $this->addSql('DROP TABLE students_scientist');
        $this->addSql('DROP TABLE students');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE students_scientist (students_id INT NOT NULL, scientist_id INT NOT NULL, INDEX IDX_CDB21B8D1AD8D010 (students_id), INDEX IDX_CDB21B8DEBA327D6 (scientist_id), PRIMARY KEY(students_id, scientist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE students (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE students_scientist ADD CONSTRAINT FK_CDB21B8D1AD8D010 FOREIGN KEY (students_id) REFERENCES students (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE students_scientist ADD CONSTRAINT FK_CDB21B8DEBA327D6 FOREIGN KEY (scientist_id) REFERENCES scientist (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
