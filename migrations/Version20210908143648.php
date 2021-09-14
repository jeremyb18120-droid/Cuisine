<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210908143648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_6BAF787032F31393 ON ingredient');
        $this->addSql('ALTER TABLE ingredient DROP recette_entity_id');
        $this->addSql('ALTER TABLE recette_entity ADD recettes_id INT NOT NULL');
        $this->addSql('ALTER TABLE recette_entity ADD CONSTRAINT FK_17B886913E2ED6D6 FOREIGN KEY (recettes_id) REFERENCES recette (id)');
        $this->addSql('CREATE INDEX IDX_17B886913E2ED6D6 ON recette_entity (recettes_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient ADD recette_entity_id INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_6BAF787032F31393 ON ingredient (recette_entity_id)');
        $this->addSql('ALTER TABLE recette_entity DROP FOREIGN KEY FK_17B886913E2ED6D6');
        $this->addSql('DROP INDEX IDX_17B886913E2ED6D6 ON recette_entity');
        $this->addSql('ALTER TABLE recette_entity DROP recettes_id');
    }
}
