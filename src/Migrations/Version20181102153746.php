<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181102153746 extends AbstractMigration
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

        $this->addSql('ALTER TABLE contract ALTER updated_at DROP NOT NULL');
        $this->addSql('ALTER TABLE merchant ALTER updated_at DROP NOT NULL');
        $this->addSql('ALTER TABLE organisation ALTER updated_at DROP NOT NULL');
        $this->addSql('ALTER TABLE product ALTER updated_at DROP NOT NULL');
        $this->addSql('ALTER TABLE merchant_product_offer_option ALTER updated_at DROP NOT NULL');
        $this->addSql('ALTER TABLE merchant_product_offer ALTER updated_at DROP NOT NULL');
        $this->addSql('ALTER TABLE contract_details ALTER updated_at DROP NOT NULL');
        $this->addSql('ALTER TABLE language ALTER updated_at DROP NOT NULL');
        $this->addSql('ALTER TABLE device ALTER updated_at DROP NOT NULL');
        $this->addSql('ALTER TABLE bank ALTER updated_at DROP NOT NULL');
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
        $this->addSql('ALTER TABLE merchant_product_offer_option ALTER updated_at SET NOT NULL');
        $this->addSql('ALTER TABLE merchant_product_offer ALTER updated_at SET NOT NULL');
        $this->addSql('ALTER TABLE organisation ALTER updated_at SET NOT NULL');
        $this->addSql('ALTER TABLE bank ALTER updated_at SET NOT NULL');
        $this->addSql('ALTER TABLE device ALTER updated_at SET NOT NULL');
        $this->addSql('ALTER TABLE contract_details ALTER updated_at SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER updated_at SET NOT NULL');
        $this->addSql('ALTER TABLE merchant ALTER updated_at SET NOT NULL');
        $this->addSql('ALTER TABLE product ALTER updated_at SET NOT NULL');
        $this->addSql('ALTER TABLE language ALTER updated_at SET NOT NULL');
    }
}
