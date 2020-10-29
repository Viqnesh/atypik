<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201021120605 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planning ADD id_habitat_id INT NOT NULL');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF6A74ADF1 FOREIGN KEY (id_habitat_id) REFERENCES habitat (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D499BFF6A74ADF1 ON planning (id_habitat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF6A74ADF1');
        $this->addSql('DROP INDEX UNIQ_D499BFF6A74ADF1 ON planning');
        $this->addSql('ALTER TABLE planning DROP id_habitat_id');
    }
}
