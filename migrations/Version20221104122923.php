<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221104122923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE match_skill (id INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, id_offer INT NOT NULL, skill_match INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offer ADD id_offer INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD id_user INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE match_skill');
        $this->addSql('ALTER TABLE offer DROP id_offer');
        $this->addSql('ALTER TABLE user DROP id_user');
    }
}
