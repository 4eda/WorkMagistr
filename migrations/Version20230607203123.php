<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230607203123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, scientist_member JSON DEFAULT NULL, date DATE DEFAULT NULL, theme LONGTEXT DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, img_event VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_scientist (event_id INT NOT NULL, scientist_id INT NOT NULL, INDEX IDX_67E2745C71F7E88B (event_id), INDEX IDX_67E2745CEBA327D6 (scientist_id), PRIMARY KEY(event_id, scientist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scientist_dirt (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, surname_two VARCHAR(255) DEFAULT NULL, biography LONGTEXT DEFAULT NULL, institut LONGTEXT DEFAULT NULL, scentis_blog VARCHAR(255) DEFAULT NULL, status TINYINT(1) NOT NULL, academic_degree VARCHAR(255) DEFAULT NULL, academic_title VARCHAR(255) DEFAULT NULL, image_scientist VARCHAR(255) DEFAULT NULL, date_brith VARCHAR(255) DEFAULT NULL, date_death VARCHAR(255) DEFAULT NULL, date_start_work VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_scientist ADD CONSTRAINT FK_67E2745C71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_scientist ADD CONSTRAINT FK_67E2745CEBA327D6 FOREIGN KEY (scientist_id) REFERENCES scientist (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event_scientist DROP FOREIGN KEY FK_67E2745C71F7E88B');
        $this->addSql('ALTER TABLE event_scientist DROP FOREIGN KEY FK_67E2745CEBA327D6');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_scientist');
        $this->addSql('DROP TABLE scientist_dirt');
    }
}
