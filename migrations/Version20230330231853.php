<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230330231853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mentors_scientist DROP FOREIGN KEY FK_7E719300961B789C');
        $this->addSql('ALTER TABLE mentors_scientist DROP FOREIGN KEY FK_7E719300EBA327D6');
        $this->addSql('DROP TABLE mentors');
        $this->addSql('DROP TABLE mentors_scientist');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mentors (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mentors_scientist (mentors_id INT NOT NULL, scientist_id INT NOT NULL, INDEX IDX_7E719300961B789C (mentors_id), INDEX IDX_7E719300EBA327D6 (scientist_id), PRIMARY KEY(mentors_id, scientist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE mentors_scientist ADD CONSTRAINT FK_7E719300961B789C FOREIGN KEY (mentors_id) REFERENCES mentors (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mentors_scientist ADD CONSTRAINT FK_7E719300EBA327D6 FOREIGN KEY (scientist_id) REFERENCES scientist (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
