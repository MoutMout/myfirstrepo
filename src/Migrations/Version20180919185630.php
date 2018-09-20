<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Create the table for the cards.
 */
final class Version20180919185630 extends AbstractMigration
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
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');
        $this->addSql('CREATE SEQUENCE card_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE card (id INT NOT NULL, userid INT NOT NULL, type VARCHAR(255) NOT NULL, numbers VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, isActive BOOLEAN NOT NULL, expireAt TIMESTAMP NOT NULL, country VARCHAR(255) NOT NULL, balance REAL NOT NULL, currency VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
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
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE card_id_seq CASCADE');
        $this->addSql('DROP TABLE card');
    }
}
