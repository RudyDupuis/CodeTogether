<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240416070515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE profil_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE speciality_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE speciality_level_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE technology_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE technology_level_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE profil (id INT NOT NULL, user_relation_id INT NOT NULL, pseudo VARCHAR(255) NOT NULL, linkedin_link VARCHAR(255) DEFAULT NULL, portfolio_link VARCHAR(255) DEFAULT NULL, repository_link VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, profil_picture VARCHAR(255) DEFAULT NULL, availability VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E6D6B2979B4D58CE ON profil (user_relation_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_PROFIL_PSEUDO ON profil (pseudo)');
        $this->addSql('CREATE TABLE speciality (id INT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE speciality_level (id INT NOT NULL, speciality_id INT NOT NULL, profil_id INT NOT NULL, level VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_484E86183B5A08D7 ON speciality_level (speciality_id)');
        $this->addSql('CREATE INDEX IDX_484E8618275ED078 ON speciality_level (profil_id)');
        $this->addSql('CREATE TABLE technology (id INT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE technology_level (id INT NOT NULL, technology_id INT NOT NULL, profil_id INT NOT NULL, level VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7A9926774235D463 ON technology_level (technology_id)');
        $this->addSql('CREATE INDEX IDX_7A992677275ED078 ON technology_level (profil_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, creation_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
        $this->addSql('COMMENT ON COLUMN "user".creation_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B2979B4D58CE FOREIGN KEY (user_relation_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE speciality_level ADD CONSTRAINT FK_484E86183B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE speciality_level ADD CONSTRAINT FK_484E8618275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE technology_level ADD CONSTRAINT FK_7A9926774235D463 FOREIGN KEY (technology_id) REFERENCES technology (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE technology_level ADD CONSTRAINT FK_7A992677275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE profil_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE speciality_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE speciality_level_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE technology_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE technology_level_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('ALTER TABLE profil DROP CONSTRAINT FK_E6D6B2979B4D58CE');
        $this->addSql('ALTER TABLE speciality_level DROP CONSTRAINT FK_484E86183B5A08D7');
        $this->addSql('ALTER TABLE speciality_level DROP CONSTRAINT FK_484E8618275ED078');
        $this->addSql('ALTER TABLE technology_level DROP CONSTRAINT FK_7A9926774235D463');
        $this->addSql('ALTER TABLE technology_level DROP CONSTRAINT FK_7A992677275ED078');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP TABLE speciality_level');
        $this->addSql('DROP TABLE technology');
        $this->addSql('DROP TABLE technology_level');
        $this->addSql('DROP TABLE "user"');
    }
}
