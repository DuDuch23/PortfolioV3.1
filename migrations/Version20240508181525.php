<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240508181525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE timeline DROP FOREIGN KEY FK_46FEC666FFE93300');
        $this->addSql('ALTER TABLE timeline ADD CONSTRAINT FK_46FEC66619C8676A FOREIGN KEY (techno_image_id) REFERENCES techno (id)');
        $this->addSql('CREATE INDEX IDX_46FEC66619C8676A ON timeline (techno_image_id)');
        $this->addSql('DROP INDEX fk_46fec666ffe93300 ON timeline');
        $this->addSql('CREATE INDEX IDX_46FEC666FFE93300 ON timeline (techno_nom_id)');
        $this->addSql('ALTER TABLE timeline ADD CONSTRAINT FK_46FEC666FFE93300 FOREIGN KEY (techno_nom_id) REFERENCES techno (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE timeline DROP FOREIGN KEY FK_46FEC66619C8676A');
        $this->addSql('DROP INDEX IDX_46FEC66619C8676A ON timeline');
        $this->addSql('ALTER TABLE timeline DROP FOREIGN KEY FK_46FEC666FFE93300');
        $this->addSql('DROP INDEX idx_46fec666ffe93300 ON timeline');
        $this->addSql('CREATE INDEX FK_46FEC666FFE93300 ON timeline (techno_nom_id)');
        $this->addSql('ALTER TABLE timeline ADD CONSTRAINT FK_46FEC666FFE93300 FOREIGN KEY (techno_nom_id) REFERENCES techno (id)');
    }
}
