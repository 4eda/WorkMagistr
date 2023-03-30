<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230329200230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, active TINYINT(1) DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_menuitem (menu_id INT NOT NULL, menuitem_id INT NOT NULL, INDEX IDX_E680B740CCD7E912 (menu_id), INDEX IDX_E680B740381BED05 (menuitem_id), PRIMARY KEY(menu_id, menuitem_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_item (id INT AUTO_INCREMENT NOT NULL, action TINYINT(1) DEFAULT NULL, item_name VARCHAR(255) NOT NULL, item_link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_item_subitem_menu (menu_item_id INT NOT NULL, subitem_menu_id INT NOT NULL, INDEX IDX_C33EF8E39AB44FE0 (menu_item_id), INDEX IDX_C33EF8E37CCE0826 (subitem_menu_id), PRIMARY KEY(menu_item_id, subitem_menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_item_menu (id INT AUTO_INCREMENT NOT NULL, action TINYINT(1) DEFAULT NULL, item_name VARCHAR(255) NOT NULL, item_link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu_menuitem ADD CONSTRAINT FK_E680B740CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menuitem ADD CONSTRAINT FK_E680B740381BED05 FOREIGN KEY (menuitem_id) REFERENCES menu_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_item_subitem_menu ADD CONSTRAINT FK_C33EF8E39AB44FE0 FOREIGN KEY (menu_item_id) REFERENCES menu_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_item_subitem_menu ADD CONSTRAINT FK_C33EF8E37CCE0826 FOREIGN KEY (subitem_menu_id) REFERENCES sub_item_menu (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_menuitem DROP FOREIGN KEY FK_E680B740CCD7E912');
        $this->addSql('ALTER TABLE menu_menuitem DROP FOREIGN KEY FK_E680B740381BED05');
        $this->addSql('ALTER TABLE menu_item_subitem_menu DROP FOREIGN KEY FK_C33EF8E39AB44FE0');
        $this->addSql('ALTER TABLE menu_item_subitem_menu DROP FOREIGN KEY FK_C33EF8E37CCE0826');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_menuitem');
        $this->addSql('DROP TABLE menu_item');
        $this->addSql('DROP TABLE menu_item_subitem_menu');
        $this->addSql('DROP TABLE sub_item_menu');
    }
}
