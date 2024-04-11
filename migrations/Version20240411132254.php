<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411132254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_880e0d76e7927c74 ON admin');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_49CF2272E7927C74 ON admin (email)');
        $this->addSql('ALTER TABLE projet ADD image_name_projet VARCHAR(255) DEFAULT NULL, ADD image_name_projet_apercu VARCHAR(255) DEFAULT NULL, DROP image_projet, DROP image_apercu');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_49cf2272e7927c74 ON Admin');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D76E7927C74 ON Admin (email)');
        $this->addSql('ALTER TABLE projet ADD image_projet VARCHAR(255) NOT NULL, ADD image_apercu VARCHAR(255) NOT NULL, DROP image_name_projet, DROP image_name_projet_apercu');
    }
}
