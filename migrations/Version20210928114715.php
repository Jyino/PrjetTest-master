<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210928114715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, laville_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, kms INT NOT NULL, INDEX IDX_C7440455A154C630 (laville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, lepays_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_5A6F91CEFFDD55FB (lepays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation (id INT AUTO_INCREMENT NOT NULL, la_visite_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_51C88FADA804BB2C (la_visite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_prestation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, lamarque_id INT NOT NULL, nom VARCHAR(255) NOT NULL, consommation INT NOT NULL, INDEX IDX_292FFF1DA1427741 (lamarque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, ledepartement_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C31E2377AB (ledepartement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visite (id INT AUTO_INCREMENT NOT NULL, lieu VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A154C630 FOREIGN KEY (laville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CEFFDD55FB FOREIGN KEY (lepays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FADA804BB2C FOREIGN KEY (la_visite_id) REFERENCES visite (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DA1427741 FOREIGN KEY (lamarque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C31E2377AB FOREIGN KEY (ledepartement_id) REFERENCES departement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C31E2377AB');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DA1427741');
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CEFFDD55FB');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A154C630');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FADA804BB2C');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE prestation');
        $this->addSql('DROP TABLE type_prestation');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('DROP TABLE ville');
        $this->addSql('DROP TABLE visite');
    }
}
