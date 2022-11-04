<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221104093024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills_user (skills_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_85F0F0237FF61858 (skills_id), INDEX IDX_85F0F023A76ED395 (user_id), PRIMARY KEY(skills_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_skills (user_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_B0630D4DA76ED395 (user_id), INDEX IDX_B0630D4D7FF61858 (skills_id), PRIMARY KEY(user_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skills_user ADD CONSTRAINT FK_85F0F0237FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skills_user ADD CONSTRAINT FK_85F0F023A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_skills ADD CONSTRAINT FK_B0630D4DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_skills ADD CONSTRAINT FK_B0630D4D7FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user DROP id_user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skills_user DROP FOREIGN KEY FK_85F0F0237FF61858');
        $this->addSql('ALTER TABLE skills_user DROP FOREIGN KEY FK_85F0F023A76ED395');
        $this->addSql('ALTER TABLE user_skills DROP FOREIGN KEY FK_B0630D4DA76ED395');
        $this->addSql('ALTER TABLE user_skills DROP FOREIGN KEY FK_B0630D4D7FF61858');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE skills_user');
        $this->addSql('DROP TABLE user_skills');
        $this->addSql('ALTER TABLE user ADD id_user INT NOT NULL');
    }
}
