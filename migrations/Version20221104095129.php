<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221104095129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offer_skills (offer_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_C6461D153C674EE (offer_id), INDEX IDX_C6461D17FF61858 (skills_id), PRIMARY KEY(offer_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills_offer (skills_id INT NOT NULL, offer_id INT NOT NULL, INDEX IDX_84B96C5E7FF61858 (skills_id), INDEX IDX_84B96C5E53C674EE (offer_id), PRIMARY KEY(skills_id, offer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offer_skills ADD CONSTRAINT FK_C6461D153C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offer_skills ADD CONSTRAINT FK_C6461D17FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skills_offer ADD CONSTRAINT FK_84B96C5E7FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skills_offer ADD CONSTRAINT FK_84B96C5E53C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offer ADD company_id INT DEFAULT NULL, DROP id_offer');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_29D6873E979B1AD6 ON offer (company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer_skills DROP FOREIGN KEY FK_C6461D153C674EE');
        $this->addSql('ALTER TABLE offer_skills DROP FOREIGN KEY FK_C6461D17FF61858');
        $this->addSql('ALTER TABLE skills_offer DROP FOREIGN KEY FK_84B96C5E7FF61858');
        $this->addSql('ALTER TABLE skills_offer DROP FOREIGN KEY FK_84B96C5E53C674EE');
        $this->addSql('DROP TABLE offer_skills');
        $this->addSql('DROP TABLE skills_offer');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E979B1AD6');
        $this->addSql('DROP INDEX IDX_29D6873E979B1AD6 ON offer');
        $this->addSql('ALTER TABLE offer ADD id_offer INT NOT NULL, DROP company_id');
    }
}
