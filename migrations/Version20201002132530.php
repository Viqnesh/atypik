<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201002132530 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE habitat ADD id_type_habitat_id INT NOT NULL');
        $this->addSql('ALTER TABLE habitat ADD CONSTRAINT FK_3B37B2E85BA3388B FOREIGN KEY (id_type_habitat_id) REFERENCES type_habitat (id)');
        $this->addSql('CREATE INDEX IDX_3B37B2E85BA3388B ON habitat (id_type_habitat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE habitat DROP FOREIGN KEY FK_3B37B2E85BA3388B');
        $this->addSql('DROP INDEX IDX_3B37B2E85BA3388B ON habitat');
        $this->addSql('ALTER TABLE habitat DROP id_type_habitat_id');
    }
}
