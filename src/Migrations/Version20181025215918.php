<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181025215918 extends AbstractMigration
{
    /**
     * @param Schema $schema
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Migrations\AbortMigrationException
     */
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP INDEX uniq_7a77764253c674ee');
        $this->addSql('DROP INDEX uniq_7a7776424584665a');
        $this->addSql('ALTER TABLE contract_details ADD option_id INT NOT NULL');
        $this->addSql('ALTER TABLE contract_details ALTER product_id SET NOT NULL');
        $this->addSql('ALTER TABLE contract_details ALTER offer_id SET NOT NULL');
        $this->addSql('ALTER TABLE contract_details ADD CONSTRAINT FK_7A777642A7C41D6F FOREIGN KEY (option_id) REFERENCES merchant_product_offer_option (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_7A7776424584665A ON contract_details (product_id)');
        $this->addSql('CREATE INDEX IDX_7A77764253C674EE ON contract_details (offer_id)');
        $this->addSql('CREATE INDEX IDX_7A777642A7C41D6F ON contract_details (option_id)');
    }

    /**
     * @param Schema $schema
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Migrations\AbortMigrationException
     */
    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE contract_details DROP CONSTRAINT FK_7A777642A7C41D6F');
        $this->addSql('DROP INDEX IDX_7A7776424584665A');
        $this->addSql('DROP INDEX IDX_7A77764253C674EE');
        $this->addSql('DROP INDEX IDX_7A777642A7C41D6F');
        $this->addSql('ALTER TABLE contract_details DROP option_id');
        $this->addSql('ALTER TABLE contract_details ALTER product_id DROP NOT NULL');
        $this->addSql('ALTER TABLE contract_details ALTER offer_id DROP NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX uniq_7a77764253c674ee ON contract_details (offer_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_7a7776424584665a ON contract_details (product_id)');
    }
}
