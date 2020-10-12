<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201005093327 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prise_de_vue ADD id_activite_habitat_id INT NOT NULL');
        $this->addSql('ALTER TABLE prise_de_vue ADD CONSTRAINT FK_3EAEED81B5E42F98 FOREIGN KEY (id_activite_habitat_id) REFERENCES activite_habitat (id)');
        $this->addSql('CREATE INDEX IDX_3EAEED81B5E42F98 ON prise_de_vue (id_activite_habitat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prise_de_vue DROP FOREIGN KEY FK_3EAEED81B5E42F98');
        $this->addSql('DROP INDEX IDX_3EAEED81B5E42F98 ON prise_de_vue');
        $this->addSql('ALTER TABLE prise_de_vue DROP id_activite_habitat_id');
    }
}
