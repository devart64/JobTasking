<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211015061700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075EAA41C53');
        $this->addSql('ALTER TABLE tache ADD url_qr_code VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX idx_93872075eaa41c53 ON tache');
        $this->addSql('CREATE INDEX IDX_93872075C40FCFA8 ON tache (piece_id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075EAA41C53 FOREIGN KEY (piece_id) REFERENCES piece (id)');
        $this->addSql('ALTER TABLE utilisateur CHANGE image_profil image_profil VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075C40FCFA8');
        $this->addSql('ALTER TABLE tache DROP url_qr_code');
        $this->addSql('DROP INDEX idx_93872075c40fcfa8 ON tache');
        $this->addSql('CREATE INDEX IDX_93872075EAA41C53 ON tache (piece_id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075C40FCFA8 FOREIGN KEY (piece_id) REFERENCES piece (id)');
        $this->addSql('ALTER TABLE utilisateur CHANGE image_profil image_profil VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
