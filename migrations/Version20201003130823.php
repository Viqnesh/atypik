<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201003130823 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_habitat_id INT NOT NULL, contenu LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_67F068BC79F37AE5 (id_user_id), INDEX IDX_67F068BCA74ADF1 (id_habitat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prise_de_vue (id INT AUTO_INCREMENT NOT NULL, id_habitat_id INT NOT NULL, url VARCHAR(25) NOT NULL, INDEX IDX_3EAEED81A74ADF1 (id_habitat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA74ADF1 FOREIGN KEY (id_habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE prise_de_vue ADD CONSTRAINT FK_3EAEED81A74ADF1 FOREIGN KEY (id_habitat_id) REFERENCES habitat (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE prise_de_vue');
    }
}
