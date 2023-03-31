<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230330234647 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mentor_scientist DROP FOREIGN KEY FK_23EB2819DB403044');
        $this->addSql('ALTER TABLE mentor_scientist DROP FOREIGN KEY FK_23EB2819EBA327D6');
        $this->addSql('ALTER TABLE student_scientist DROP FOREIGN KEY FK_86198BE1CB944F1A');
        $this->addSql('ALTER TABLE student_scientist DROP FOREIGN KEY FK_86198BE1EBA327D6');
        $this->addSql('DROP TABLE mentor');
        $this->addSql('DROP TABLE mentor_scientist');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE student_scientist');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mentor (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mentor_scientist (mentor_id INT NOT NULL, scientist_id INT NOT NULL, INDEX IDX_23EB2819DB403044 (mentor_id), INDEX IDX_23EB2819EBA327D6 (scientist_id), PRIMARY KEY(mentor_id, scientist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE student_scientist (student_id INT NOT NULL, scientist_id INT NOT NULL, INDEX IDX_86198BE1CB944F1A (student_id), INDEX IDX_86198BE1EBA327D6 (scientist_id), PRIMARY KEY(student_id, scientist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE mentor_scientist ADD CONSTRAINT FK_23EB2819DB403044 FOREIGN KEY (mentor_id) REFERENCES mentor (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mentor_scientist ADD CONSTRAINT FK_23EB2819EBA327D6 FOREIGN KEY (scientist_id) REFERENCES scientist (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_scientist ADD CONSTRAINT FK_86198BE1CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_scientist ADD CONSTRAINT FK_86198BE1EBA327D6 FOREIGN KEY (scientist_id) REFERENCES scientist (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
