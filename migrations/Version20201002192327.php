<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201002192327 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE propriete_habitat (id INT AUTO_INCREMENT NOT NULL, id_propriete_id INT NOT NULL, id_habitat_id INT NOT NULL, valeur_propriete VARCHAR(30) NOT NULL, INDEX IDX_849F54563B9719DD (id_propriete_id), INDEX IDX_849F5456A74ADF1 (id_habitat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE propriete_habitat ADD CONSTRAINT FK_849F54563B9719DD FOREIGN KEY (id_propriete_id) REFERENCES propriete (id)');
        $this->addSql('ALTER TABLE propriete_habitat ADD CONSTRAINT FK_849F5456A74ADF1 FOREIGN KEY (id_habitat_id) REFERENCES habitat (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE propriete_habitat');
    }
}
