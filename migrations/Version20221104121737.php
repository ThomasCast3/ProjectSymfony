<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221104121737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE skill_offer (id INT AUTO_INCREMENT NOT NULL, id_offer INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_user (id INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offer_skills DROP FOREIGN KEY FK_C6461D153C674EE');
        $this->addSql('ALTER TABLE offer_skills DROP FOREIGN KEY FK_C6461D17FF61858');
        $this->addSql('ALTER TABLE user_skills DROP FOREIGN KEY FK_B0630D4D7FF61858');
        $this->addSql('ALTER TABLE user_skills DROP FOREIGN KEY FK_B0630D4DA76ED395');
        $this->addSql('DROP TABLE match_skill');
        $this->addSql('DROP TABLE offer_skills');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE user_skills');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E979B1AD6');
        $this->addSql('DROP INDEX IDX_29D6873E979B1AD6 ON offer');
        $this->addSql('ALTER TABLE offer DROP company_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE match_skill (id INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, id_offer INT NOT NULL, skill_match INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE offer_skills (offer_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_C6461D17FF61858 (skills_id), INDEX IDX_C6461D153C674EE (offer_id), PRIMARY KEY(offer_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_skills (user_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_B0630D4D7FF61858 (skills_id), INDEX IDX_B0630D4DA76ED395 (user_id), PRIMARY KEY(user_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE offer_skills ADD CONSTRAINT FK_C6461D153C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offer_skills ADD CONSTRAINT FK_C6461D17FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_skills ADD CONSTRAINT FK_B0630D4D7FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_skills ADD CONSTRAINT FK_B0630D4DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE skill_offer');
        $this->addSql('DROP TABLE skill_user');
        $this->addSql('ALTER TABLE offer ADD company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_29D6873E979B1AD6 ON offer (company_id)');
    }
}
