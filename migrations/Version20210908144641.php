<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210908144641 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recette_entity ADD ingredients_id INT NOT NULL');
        $this->addSql('ALTER TABLE recette_entity ADD CONSTRAINT FK_17B886913EC4DCE FOREIGN KEY (ingredients_id) REFERENCES ingredient (id)');
        $this->addSql('CREATE INDEX IDX_17B886913EC4DCE ON recette_entity (ingredients_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recette_entity DROP FOREIGN KEY FK_17B886913EC4DCE');
        $this->addSql('DROP INDEX IDX_17B886913EC4DCE ON recette_entity');
        $this->addSql('ALTER TABLE recette_entity DROP ingredients_id');
    }
}
