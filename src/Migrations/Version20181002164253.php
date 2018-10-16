<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181002164253 extends AbstractMigration
{
    /**
     * Create Table.
     *
     * @param Schema $schema
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Migrations\AbortMigrationException
     */
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE location_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE location (id INT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, locality VARCHAR(255) NOT NULL, house_number VARCHAR(255) NOT NULL, website VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, phone_number_bis VARCHAR(255) DEFAULT NULL, activity_id INT NOT NULL, bis_activity_id INT DEFAULT NULL, ter_activity_id INT DEFAULT NULL, wifi BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE transaction ALTER card_id DROP NOT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D14ACC9A20 FOREIGN KEY (card_id) REFERENCES card (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_723705D14ACC9A20 ON transaction (card_id)');
    }

    /**
     * Remove table.
     *
     * @param Schema $schema
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Migrations\AbortMigrationException
     */
    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE location_id_seq CASCADE');
        $this->addSql('DROP TABLE location');
        $this->addSql('ALTER TABLE transaction DROP CONSTRAINT FK_723705D14ACC9A20');
        $this->addSql('DROP INDEX IDX_723705D14ACC9A20');
        $this->addSql('ALTER TABLE transaction ALTER card_id SET NOT NULL');
    }
}
