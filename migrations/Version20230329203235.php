<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230329203235 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_menu_one_item (menu_id INT NOT NULL, menu_one_item_id INT NOT NULL, INDEX IDX_E1D77637CCD7E912 (menu_id), INDEX IDX_E1D776371A88513C (menu_one_item_id), PRIMARY KEY(menu_id, menu_one_item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_one_item (id INT AUTO_INCREMENT NOT NULL, action TINYINT(1) DEFAULT NULL, item_name VARCHAR(255) NOT NULL, item_link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_one_item_subitem_menu (menu_one_item_id INT NOT NULL, subitem_menu_id INT NOT NULL, INDEX IDX_B865A2071A88513C (menu_one_item_id), INDEX IDX_B865A2077CCE0826 (subitem_menu_id), PRIMARY KEY(menu_one_item_id, subitem_menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu_menu_one_item ADD CONSTRAINT FK_E1D77637CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menu_one_item ADD CONSTRAINT FK_E1D776371A88513C FOREIGN KEY (menu_one_item_id) REFERENCES menu_one_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_one_item_subitem_menu ADD CONSTRAINT FK_B865A2071A88513C FOREIGN KEY (menu_one_item_id) REFERENCES menu_one_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_one_item_subitem_menu ADD CONSTRAINT FK_B865A2077CCE0826 FOREIGN KEY (subitem_menu_id) REFERENCES sub_item_menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_item_subitem_menu DROP FOREIGN KEY FK_C33EF8E39AB44FE0');
        $this->addSql('ALTER TABLE menu_item_subitem_menu DROP FOREIGN KEY FK_C33EF8E37CCE0826');
        $this->addSql('ALTER TABLE menu_menuitem DROP FOREIGN KEY FK_E680B740CCD7E912');
        $this->addSql('ALTER TABLE menu_menuitem DROP FOREIGN KEY FK_E680B740381BED05');
        $this->addSql('DROP TABLE menu_item');
        $this->addSql('DROP TABLE menu_item_subitem_menu');
        $this->addSql('DROP TABLE menu_menuitem');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_item (id INT AUTO_INCREMENT NOT NULL, action TINYINT(1) DEFAULT NULL, item_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, item_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE menu_item_subitem_menu (menu_item_id INT NOT NULL, subitem_menu_id INT NOT NULL, INDEX IDX_C33EF8E37CCE0826 (subitem_menu_id), INDEX IDX_C33EF8E39AB44FE0 (menu_item_id), PRIMARY KEY(menu_item_id, subitem_menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE menu_menuitem (menu_id INT NOT NULL, menuitem_id INT NOT NULL, INDEX IDX_E680B740381BED05 (menuitem_id), INDEX IDX_E680B740CCD7E912 (menu_id), PRIMARY KEY(menu_id, menuitem_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE menu_item_subitem_menu ADD CONSTRAINT FK_C33EF8E39AB44FE0 FOREIGN KEY (menu_item_id) REFERENCES menu_item (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_item_subitem_menu ADD CONSTRAINT FK_C33EF8E37CCE0826 FOREIGN KEY (subitem_menu_id) REFERENCES sub_item_menu (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menuitem ADD CONSTRAINT FK_E680B740CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menuitem ADD CONSTRAINT FK_E680B740381BED05 FOREIGN KEY (menuitem_id) REFERENCES menu_item (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menu_one_item DROP FOREIGN KEY FK_E1D77637CCD7E912');
        $this->addSql('ALTER TABLE menu_menu_one_item DROP FOREIGN KEY FK_E1D776371A88513C');
        $this->addSql('ALTER TABLE menu_one_item_subitem_menu DROP FOREIGN KEY FK_B865A2071A88513C');
        $this->addSql('ALTER TABLE menu_one_item_subitem_menu DROP FOREIGN KEY FK_B865A2077CCE0826');
        $this->addSql('DROP TABLE menu_menu_one_item');
        $this->addSql('DROP TABLE menu_one_item');
        $this->addSql('DROP TABLE menu_one_item_subitem_menu');
    }
}
