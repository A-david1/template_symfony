<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721122954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aliment ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE aliment ADD CONSTRAINT FK_70FF972B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_70FF972B12469DE2 ON aliment (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aliment DROP FOREIGN KEY FK_70FF972B12469DE2');
        $this->addSql('DROP INDEX IDX_70FF972B12469DE2 ON aliment');
        $this->addSql('ALTER TABLE aliment DROP category_id');
    }
}
