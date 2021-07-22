<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721171244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu ADD shoppinglist_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A934F22EB9A FOREIGN KEY (shoppinglist_id) REFERENCES shopping_list (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7D053A934F22EB9A ON menu (shoppinglist_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A934F22EB9A');
        $this->addSql('DROP INDEX UNIQ_7D053A934F22EB9A ON menu');
        $this->addSql('ALTER TABLE menu DROP shoppinglist_id');
    }
}
