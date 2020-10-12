<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201002133933 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite_habitat DROP FOREIGN KEY FK_7191756D831D4546');
        $this->addSql('DROP INDEX IDX_7191756D831D4546 ON activite_habitat');
        $this->addSql('ALTER TABLE activite_habitat CHANGE adresse adresse VARCHAR(30) NOT NULL, CHANGE id_activite_id type_activite_id INT NOT NULL');
        $this->addSql('ALTER TABLE activite_habitat ADD CONSTRAINT FK_7191756DD0165F20 FOREIGN KEY (type_activite_id) REFERENCES activite (id)');
        $this->addSql('CREATE INDEX IDX_7191756DD0165F20 ON activite_habitat (type_activite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite_habitat DROP FOREIGN KEY FK_7191756DD0165F20');
        $this->addSql('DROP INDEX IDX_7191756DD0165F20 ON activite_habitat');
        $this->addSql('ALTER TABLE activite_habitat CHANGE adresse adresse VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type_activite_id id_activite_id INT NOT NULL');
        $this->addSql('ALTER TABLE activite_habitat ADD CONSTRAINT FK_7191756D831D4546 FOREIGN KEY (id_activite_id) REFERENCES activite (id)');
        $this->addSql('CREATE INDEX IDX_7191756D831D4546 ON activite_habitat (id_activite_id)');
    }
}
