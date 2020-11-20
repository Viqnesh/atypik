<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201120103050 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, begin_at DATETIME NOT NULL, end_at DATETIME DEFAULT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE braintree (id INT AUTO_INCREMENT NOT NULL, merchant_id VARCHAR(40) NOT NULL, public_key VARCHAR(30) NOT NULL, private_key VARCHAR(70) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home_controller (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paypal (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA79F37AE5');
        $this->addSql('DROP INDEX IDX_BF5476CA79F37AE5 ON notification');
        $this->addSql('ALTER TABLE notification ADD type_habitat_id INT NOT NULL, DROP statut, CHANGE id_user_id title_id INT NOT NULL');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA9F87BD FOREIGN KEY (title_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAB2FDFB03 FOREIGN KEY (type_habitat_id) REFERENCES type_habitat (id)');
        $this->addSql('CREATE INDEX IDX_BF5476CAA9F87BD ON notification (title_id)');
        $this->addSql('CREATE INDEX IDX_BF5476CAB2FDFB03 ON notification (type_habitat_id)');
        $this->addSql('ALTER TABLE planning ADD etat VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE braintree');
        $this->addSql('DROP TABLE home_controller');
        $this->addSql('DROP TABLE paypal');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAA9F87BD');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAB2FDFB03');
        $this->addSql('DROP INDEX IDX_BF5476CAA9F87BD ON notification');
        $this->addSql('DROP INDEX IDX_BF5476CAB2FDFB03 ON notification');
        $this->addSql('ALTER TABLE notification ADD id_user_id INT NOT NULL, ADD statut VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP title_id, DROP type_habitat_id');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BF5476CA79F37AE5 ON notification (id_user_id)');
        $this->addSql('ALTER TABLE planning DROP etat');
    }
}
