<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230607201406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, date DATE NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog_scientist (blog_id INT NOT NULL, scientist_id INT NOT NULL, INDEX IDX_4409A22EDAE07E97 (blog_id), INDEX IDX_4409A22EEBA327D6 (scientist_id), PRIMARY KEY(blog_id, scientist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_scientist (category_id INT NOT NULL, scientist_id INT NOT NULL, INDEX IDX_2617985112469DE2 (category_id), INDEX IDX_26179851EBA327D6 (scientist_id), PRIMARY KEY(category_id, scientist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_blog (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_blog_blog (category_blog_id INT NOT NULL, blog_id INT NOT NULL, INDEX IDX_E7A50FE31D383EE9 (category_blog_id), INDEX IDX_E7A50FE3DAE07E97 (blog_id), PRIMARY KEY(category_blog_id, blog_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inst_work (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, active TINYINT(1) NOT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inst_work_scientist (inst_work_id INT NOT NULL, scientist_id INT NOT NULL, INDEX IDX_258DC262D6E3EC45 (inst_work_id), INDEX IDX_258DC262EBA327D6 (scientist_id), PRIMARY KEY(inst_work_id, scientist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, date_published DATE NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_scientist (news_id INT NOT NULL, scientist_id INT NOT NULL, INDEX IDX_FD5215A0B5A459A0 (news_id), INDEX IDX_FD5215A0EBA327D6 (scientist_id), PRIMARY KEY(news_id, scientist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_admin (news_id INT NOT NULL, admin_id INT NOT NULL, INDEX IDX_F2B18A28B5A459A0 (news_id), INDEX IDX_F2B18A28642B8210 (admin_id), PRIMARY KEY(news_id, admin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog_scientist ADD CONSTRAINT FK_4409A22EDAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_scientist ADD CONSTRAINT FK_4409A22EEBA327D6 FOREIGN KEY (scientist_id) REFERENCES scientist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_scientist ADD CONSTRAINT FK_2617985112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_scientist ADD CONSTRAINT FK_26179851EBA327D6 FOREIGN KEY (scientist_id) REFERENCES scientist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_blog_blog ADD CONSTRAINT FK_E7A50FE31D383EE9 FOREIGN KEY (category_blog_id) REFERENCES category_blog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_blog_blog ADD CONSTRAINT FK_E7A50FE3DAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inst_work_scientist ADD CONSTRAINT FK_258DC262D6E3EC45 FOREIGN KEY (inst_work_id) REFERENCES inst_work (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inst_work_scientist ADD CONSTRAINT FK_258DC262EBA327D6 FOREIGN KEY (scientist_id) REFERENCES scientist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_scientist ADD CONSTRAINT FK_FD5215A0B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_scientist ADD CONSTRAINT FK_FD5215A0EBA327D6 FOREIGN KEY (scientist_id) REFERENCES scientist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_admin ADD CONSTRAINT FK_F2B18A28B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_admin ADD CONSTRAINT FK_F2B18A28642B8210 FOREIGN KEY (admin_id) REFERENCES `admin` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog_scientist DROP FOREIGN KEY FK_4409A22EDAE07E97');
        $this->addSql('ALTER TABLE blog_scientist DROP FOREIGN KEY FK_4409A22EEBA327D6');
        $this->addSql('ALTER TABLE category_scientist DROP FOREIGN KEY FK_2617985112469DE2');
        $this->addSql('ALTER TABLE category_scientist DROP FOREIGN KEY FK_26179851EBA327D6');
        $this->addSql('ALTER TABLE category_blog_blog DROP FOREIGN KEY FK_E7A50FE31D383EE9');
        $this->addSql('ALTER TABLE category_blog_blog DROP FOREIGN KEY FK_E7A50FE3DAE07E97');
        $this->addSql('ALTER TABLE inst_work_scientist DROP FOREIGN KEY FK_258DC262D6E3EC45');
        $this->addSql('ALTER TABLE inst_work_scientist DROP FOREIGN KEY FK_258DC262EBA327D6');
        $this->addSql('ALTER TABLE news_scientist DROP FOREIGN KEY FK_FD5215A0B5A459A0');
        $this->addSql('ALTER TABLE news_scientist DROP FOREIGN KEY FK_FD5215A0EBA327D6');
        $this->addSql('ALTER TABLE news_admin DROP FOREIGN KEY FK_F2B18A28B5A459A0');
        $this->addSql('ALTER TABLE news_admin DROP FOREIGN KEY FK_F2B18A28642B8210');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE blog_scientist');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_scientist');
        $this->addSql('DROP TABLE category_blog');
        $this->addSql('DROP TABLE category_blog_blog');
        $this->addSql('DROP TABLE inst_work');
        $this->addSql('DROP TABLE inst_work_scientist');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE news_scientist');
        $this->addSql('DROP TABLE news_admin');
    }
}
