<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230329204640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_one_item_sub_item_menu (menu_one_item_id INT NOT NULL, sub_item_menu_id INT NOT NULL, INDEX IDX_25A9F3601A88513C (menu_one_item_id), INDEX IDX_25A9F360D0D88870 (sub_item_menu_id), PRIMARY KEY(menu_one_item_id, sub_item_menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu_one_item_sub_item_menu ADD CONSTRAINT FK_25A9F3601A88513C FOREIGN KEY (menu_one_item_id) REFERENCES menu_one_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_one_item_sub_item_menu ADD CONSTRAINT FK_25A9F360D0D88870 FOREIGN KEY (sub_item_menu_id) REFERENCES sub_item_menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_one_item_subitem_menu DROP FOREIGN KEY FK_B865A2071A88513C');
        $this->addSql('ALTER TABLE menu_one_item_subitem_menu DROP FOREIGN KEY FK_B865A2077CCE0826');
        $this->addSql('DROP TABLE menu_one_item_subitem_menu');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_one_item_subitem_menu (menu_one_item_id INT NOT NULL, subitem_menu_id INT NOT NULL, INDEX IDX_B865A2071A88513C (menu_one_item_id), INDEX IDX_B865A2077CCE0826 (subitem_menu_id), PRIMARY KEY(menu_one_item_id, subitem_menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE menu_one_item_subitem_menu ADD CONSTRAINT FK_B865A2071A88513C FOREIGN KEY (menu_one_item_id) REFERENCES menu_one_item (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_one_item_subitem_menu ADD CONSTRAINT FK_B865A2077CCE0826 FOREIGN KEY (subitem_menu_id) REFERENCES sub_item_menu (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_one_item_sub_item_menu DROP FOREIGN KEY FK_25A9F3601A88513C');
        $this->addSql('ALTER TABLE menu_one_item_sub_item_menu DROP FOREIGN KEY FK_25A9F360D0D88870');
        $this->addSql('DROP TABLE menu_one_item_sub_item_menu');
    }
}
