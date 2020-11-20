<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201120124237 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE home_controller (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paypal (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE location');
        $this->addSql('ALTER TABLE activite_habitat CHANGE type_activite_id type_activite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activite_habitat_habitat DROP FOREIGN KEY FK_A84915EAAFFE2D26');
        $this->addSql('ALTER TABLE activite_habitat_habitat DROP FOREIGN KEY FK_A84915EAF30EB353');
        $this->addSql('ALTER TABLE activite_habitat_habitat ADD CONSTRAINT FK_A84915EAAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE activite_habitat_habitat ADD CONSTRAINT FK_A84915EAF30EB353 FOREIGN KEY (activite_habitat_id) REFERENCES activite_habitat (id)');
        $this->addSql('ALTER TABLE commentaire CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE id_habitat_id id_habitat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE habitat ADD photo VARCHAR(70) NOT NULL, CHANGE id_type_habitat_id id_type_habitat_id INT DEFAULT NULL, CHANGE proprietaire_id proprietaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notification ADD statut VARCHAR(25) NOT NULL, CHANGE id_user_id id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE planning CHANGE id_habitat_id id_habitat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prise_de_vue CHANGE id_habitat_id id_habitat_id INT DEFAULT NULL, CHANGE id_activite_habitat_id id_activite_habitat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE propriete CHANGE id_type_habitat_id id_type_habitat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE propriete_habitat CHANGE id_propriete_id id_propriete_id INT DEFAULT NULL, CHANGE id_habitat_id id_habitat_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, begin_at DATETIME NOT NULL, end_at DATETIME DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, id_habitat_id INT NOT NULL, id_user_id INT NOT NULL, date_reservation DATETIME NOT NULL, statut VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_5E9E89CB79F37AE5 (id_user_id), INDEX IDX_5E9E89CBA74ADF1 (id_habitat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBA74ADF1 FOREIGN KEY (id_habitat_id) REFERENCES habitat (id)');
        $this->addSql('DROP TABLE home_controller');
        $this->addSql('DROP TABLE paypal');
        $this->addSql('ALTER TABLE activite_habitat CHANGE type_activite_id type_activite_id INT NOT NULL');
        $this->addSql('ALTER TABLE activite_habitat_habitat DROP FOREIGN KEY FK_A84915EAF30EB353');
        $this->addSql('ALTER TABLE activite_habitat_habitat DROP FOREIGN KEY FK_A84915EAAFFE2D26');
        $this->addSql('ALTER TABLE activite_habitat_habitat ADD CONSTRAINT FK_A84915EAF30EB353 FOREIGN KEY (activite_habitat_id) REFERENCES activite_habitat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_habitat_habitat ADD CONSTRAINT FK_A84915EAAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire CHANGE id_user_id id_user_id INT NOT NULL, CHANGE id_habitat_id id_habitat_id INT NOT NULL');
        $this->addSql('ALTER TABLE habitat DROP photo, CHANGE id_type_habitat_id id_type_habitat_id INT NOT NULL, CHANGE proprietaire_id proprietaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE notification DROP statut, CHANGE id_user_id id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE planning CHANGE id_habitat_id id_habitat_id INT NOT NULL');
        $this->addSql('ALTER TABLE prise_de_vue CHANGE id_habitat_id id_habitat_id INT NOT NULL, CHANGE id_activite_habitat_id id_activite_habitat_id INT NOT NULL');
        $this->addSql('ALTER TABLE propriete CHANGE id_type_habitat_id id_type_habitat_id INT NOT NULL');
        $this->addSql('ALTER TABLE propriete_habitat CHANGE id_propriete_id id_propriete_id INT NOT NULL, CHANGE id_habitat_id id_habitat_id INT NOT NULL');
    }
}
