<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201002131837 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite_habitat (id INT AUTO_INCREMENT NOT NULL, id_activite_id INT NOT NULL, adresse VARCHAR(25) NOT NULL, distance DOUBLE PRECISION NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_7191756D831D4546 (id_activite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite_habitat_habitat (activite_habitat_id INT NOT NULL, habitat_id INT NOT NULL, INDEX IDX_A84915EAF30EB353 (activite_habitat_id), INDEX IDX_A84915EAAFFE2D26 (habitat_id), PRIMARY KEY(activite_habitat_id, habitat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitat (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, nb_couchages VARCHAR(25) NOT NULL, capacite INT NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, id_habitat_id INT NOT NULL, id_user_id INT NOT NULL, date_reservation DATE NOT NULL, INDEX IDX_5E9E89CBA74ADF1 (id_habitat_id), INDEX IDX_5E9E89CB79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE propriete (id INT AUTO_INCREMENT NOT NULL, id_type_habitat_id INT NOT NULL, nom VARCHAR(40) NOT NULL, INDEX IDX_73A85B935BA3388B (id_type_habitat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_habitat (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649AA08CB10 (login), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite_habitat ADD CONSTRAINT FK_7191756D831D4546 FOREIGN KEY (id_activite_id) REFERENCES activite (id)');
        $this->addSql('ALTER TABLE activite_habitat_habitat ADD CONSTRAINT FK_A84915EAF30EB353 FOREIGN KEY (activite_habitat_id) REFERENCES activite_habitat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_habitat_habitat ADD CONSTRAINT FK_A84915EAAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBA74ADF1 FOREIGN KEY (id_habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE propriete ADD CONSTRAINT FK_73A85B935BA3388B FOREIGN KEY (id_type_habitat_id) REFERENCES type_habitat (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite_habitat DROP FOREIGN KEY FK_7191756D831D4546');
        $this->addSql('ALTER TABLE activite_habitat_habitat DROP FOREIGN KEY FK_A84915EAF30EB353');
        $this->addSql('ALTER TABLE activite_habitat_habitat DROP FOREIGN KEY FK_A84915EAAFFE2D26');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CBA74ADF1');
        $this->addSql('ALTER TABLE propriete DROP FOREIGN KEY FK_73A85B935BA3388B');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB79F37AE5');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE activite_habitat');
        $this->addSql('DROP TABLE activite_habitat_habitat');
        $this->addSql('DROP TABLE habitat');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE propriete');
        $this->addSql('DROP TABLE type_habitat');
        $this->addSql('DROP TABLE user');
    }
}
