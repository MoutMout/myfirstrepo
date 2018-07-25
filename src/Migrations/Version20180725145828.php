<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180725145828 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE artist_label DROP CONSTRAINT fk_6eab60bb33b92f39');
        $this->addSql('ALTER TABLE artist_label DROP CONSTRAINT fk_6eab60bbb7970cf8');
        $this->addSql('ALTER TABLE artist_gig DROP CONSTRAINT fk_d35a513b7970cf8');
        $this->addSql('ALTER TABLE artist_gig DROP CONSTRAINT fk_d35a513fe058e5');
        $this->addSql('DROP SEQUENCE artist_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE label_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE gig_id_seq CASCADE');
        $this->addSql('DROP TABLE label');
        $this->addSql('DROP TABLE artist_label');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE gig');
        $this->addSql('DROP TABLE artist_gig');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE artist_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE label_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE gig_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE label (id INT NOT NULL, created_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_ea750e8989d9b62 ON label (slug)');
        $this->addSql('CREATE UNIQUE INDEX uniq_ea750e85e237e06 ON label (name)');
        $this->addSql('CREATE INDEX idx_ea750e8b03a8386 ON label (created_by_id)');
        $this->addSql('CREATE TABLE artist_label (artist_id INT NOT NULL, label_id INT NOT NULL, PRIMARY KEY(artist_id, label_id))');
        $this->addSql('CREATE INDEX idx_6eab60bb33b92f39 ON artist_label (label_id)');
        $this->addSql('CREATE INDEX idx_6eab60bbb7970cf8 ON artist_label (artist_id)');
        $this->addSql('CREATE TABLE artist (id INT NOT NULL, created_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, bio TEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, image_name VARCHAR(255) DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_1599687989d9b62 ON artist (slug)');
        $this->addSql('CREATE INDEX idx_1599687b03a8386 ON artist (created_by_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_15996875e237e06 ON artist (name)');
        $this->addSql('CREATE TABLE gig (id INT NOT NULL, created_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, startdate TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, enddate TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, venue VARCHAR(255) DEFAULT NULL, address VARCHAR(255) NOT NULL, facebooklink VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_d53020a24e6eb42d ON gig (facebooklink)');
        $this->addSql('CREATE INDEX idx_d53020a2b03a8386 ON gig (created_by_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_d53020a25e237e06 ON gig (name)');
        $this->addSql('CREATE TABLE artist_gig (artist_id INT NOT NULL, gig_id INT NOT NULL, PRIMARY KEY(artist_id, gig_id))');
        $this->addSql('CREATE INDEX idx_d35a513fe058e5 ON artist_gig (gig_id)');
        $this->addSql('CREATE INDEX idx_d35a513b7970cf8 ON artist_gig (artist_id)');
        $this->addSql('ALTER TABLE label ADD CONSTRAINT fk_ea750e8b03a8386 FOREIGN KEY (created_by_id) REFERENCES api_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artist_label ADD CONSTRAINT fk_6eab60bbb7970cf8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artist_label ADD CONSTRAINT fk_6eab60bb33b92f39 FOREIGN KEY (label_id) REFERENCES label (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artist ADD CONSTRAINT fk_1599687b03a8386 FOREIGN KEY (created_by_id) REFERENCES api_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE gig ADD CONSTRAINT fk_d53020a2b03a8386 FOREIGN KEY (created_by_id) REFERENCES api_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artist_gig ADD CONSTRAINT fk_d35a513b7970cf8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artist_gig ADD CONSTRAINT fk_d35a513fe058e5 FOREIGN KEY (gig_id) REFERENCES gig (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
