<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210919085701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tache CHANGE idcategorie_tache categorie_tache_id INT NOT NULL');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075EAA41C53 FOREIGN KEY (categorie_tache_id) REFERENCES categorie_tache (id)');
        $this->addSql('CREATE INDEX IDX_93872075EAA41C53 ON tache (categorie_tache_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075EAA41C53');
        $this->addSql('DROP INDEX IDX_93872075EAA41C53 ON tache');
        $this->addSql('ALTER TABLE tache CHANGE categorie_tache_id idcategorie_tache INT NOT NULL');
    }
}
