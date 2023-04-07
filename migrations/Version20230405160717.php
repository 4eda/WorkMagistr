<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230405160717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE student_mentor (scientist_source INT NOT NULL, scientist_target INT NOT NULL, INDEX IDX_E23BA5E8AEC29 (scientist_source), INDEX IDX_E23BA5E196FBCA6 (scientist_target), PRIMARY KEY(scientist_source, scientist_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student_mentor ADD CONSTRAINT FK_E23BA5E8AEC29 FOREIGN KEY (scientist_source) REFERENCES scientist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_mentor ADD CONSTRAINT FK_E23BA5E196FBCA6 FOREIGN KEY (scientist_target) REFERENCES scientist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scientist_scientist DROP FOREIGN KEY FK_DA303881196FBCA6');
        $this->addSql('ALTER TABLE scientist_scientist DROP FOREIGN KEY FK_DA3038818AEC29');
        $this->addSql('DROP TABLE scientist_scientist');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE scientist_scientist (scientist_source INT NOT NULL, scientist_target INT NOT NULL, INDEX IDX_DA3038818AEC29 (scientist_source), INDEX IDX_DA303881196FBCA6 (scientist_target), PRIMARY KEY(scientist_source, scientist_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE scientist_scientist ADD CONSTRAINT FK_DA303881196FBCA6 FOREIGN KEY (scientist_target) REFERENCES scientist (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scientist_scientist ADD CONSTRAINT FK_DA3038818AEC29 FOREIGN KEY (scientist_source) REFERENCES scientist (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_mentor DROP FOREIGN KEY FK_E23BA5E8AEC29');
        $this->addSql('ALTER TABLE student_mentor DROP FOREIGN KEY FK_E23BA5E196FBCA6');
        $this->addSql('DROP TABLE student_mentor');
    }
}
