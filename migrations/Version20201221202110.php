<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201221202110 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_entity (id INT AUTO_INCREMENT NOT NULL, auteur_article_id INT DEFAULT NULL, titre_article VARCHAR(255) NOT NULL, texte_article LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_64EFD3E893F4A80 (auteur_article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auteur_entity (id INT AUTO_INCREMENT NOT NULL, nom_auteur VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_entity ADD CONSTRAINT FK_64EFD3E893F4A80 FOREIGN KEY (auteur_article_id) REFERENCES auteur_entity (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_entity DROP FOREIGN KEY FK_64EFD3E893F4A80');
        $this->addSql('DROP TABLE article_entity');
        $this->addSql('DROP TABLE auteur_entity');
    }
}
