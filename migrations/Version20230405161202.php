<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230405161202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_mentor DROP FOREIGN KEY FK_E23BA5E196FBCA6');
        $this->addSql('ALTER TABLE student_mentor DROP FOREIGN KEY FK_E23BA5E8AEC29');
        $this->addSql('DROP INDEX IDX_E23BA5E8AEC29 ON student_mentor');
        $this->addSql('DROP INDEX IDX_E23BA5E196FBCA6 ON student_mentor');
        $this->addSql('DROP INDEX `primary` ON student_mentor');
        $this->addSql('ALTER TABLE student_mentor ADD student_id INT NOT NULL, ADD mentor_id INT NOT NULL, DROP scientist_source, DROP scientist_target');
        $this->addSql('ALTER TABLE student_mentor ADD CONSTRAINT FK_E23BA5ECB944F1A FOREIGN KEY (student_id) REFERENCES scientist (id)');
        $this->addSql('ALTER TABLE student_mentor ADD CONSTRAINT FK_E23BA5EDB403044 FOREIGN KEY (mentor_id) REFERENCES scientist (id)');
        $this->addSql('CREATE INDEX IDX_E23BA5ECB944F1A ON student_mentor (student_id)');
        $this->addSql('CREATE INDEX IDX_E23BA5EDB403044 ON student_mentor (mentor_id)');
        $this->addSql('ALTER TABLE student_mentor ADD PRIMARY KEY (student_id, mentor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_mentor DROP FOREIGN KEY FK_E23BA5ECB944F1A');
        $this->addSql('ALTER TABLE student_mentor DROP FOREIGN KEY FK_E23BA5EDB403044');
        $this->addSql('DROP INDEX IDX_E23BA5ECB944F1A ON student_mentor');
        $this->addSql('DROP INDEX IDX_E23BA5EDB403044 ON student_mentor');
        $this->addSql('DROP INDEX `PRIMARY` ON student_mentor');
        $this->addSql('ALTER TABLE student_mentor ADD scientist_source INT NOT NULL, ADD scientist_target INT NOT NULL, DROP student_id, DROP mentor_id');
        $this->addSql('ALTER TABLE student_mentor ADD CONSTRAINT FK_E23BA5E196FBCA6 FOREIGN KEY (scientist_target) REFERENCES scientist (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_mentor ADD CONSTRAINT FK_E23BA5E8AEC29 FOREIGN KEY (scientist_source) REFERENCES scientist (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_E23BA5E8AEC29 ON student_mentor (scientist_source)');
        $this->addSql('CREATE INDEX IDX_E23BA5E196FBCA6 ON student_mentor (scientist_target)');
        $this->addSql('ALTER TABLE student_mentor ADD PRIMARY KEY (scientist_source, scientist_target)');
    }
}
