<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181022142655 extends AbstractMigration
{

    /**
     * Create Table.
     *
     * @param Schema $schema
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Migrations\AbortMigrationException
     */
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE merchant_product_offer_option_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE organisation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE account_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE merchant_product_offer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE contract_details_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE merchant_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE poss_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE activity_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE device_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE bank_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_roles_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE contract_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, activity_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, image_url VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at INT NOT NULL, updated_at INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D34A04AD81C06096 ON product (activity_id)');
        $this->addSql('CREATE TABLE merchant_product_offer_option (id INT NOT NULL, offer_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, percent_cost VARCHAR(255) NOT NULL, created_at INT NOT NULL, updated_at INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_98225B6953C674EE ON merchant_product_offer_option (offer_id)');
        $this->addSql('CREATE TABLE organisation (id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at INT NOT NULL, updated_at INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, account_id INT DEFAULT NULL, role_id INT DEFAULT NULL, merchant_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, created_at INT NOT NULL, updated_at INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E99B6B5FBA ON users (account_id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9D60322AC ON users (role_id)');
        $this->addSql('CREATE INDEX IDX_1483A5E96796D554 ON users (merchant_id)');
        $this->addSql('CREATE TABLE users_locations (user_id INT NOT NULL, location_id INT NOT NULL, PRIMARY KEY(user_id, location_id))');
        $this->addSql('CREATE INDEX IDX_719B305BA76ED395 ON users_locations (user_id)');
        $this->addSql('CREATE INDEX IDX_719B305B64D218E ON users_locations (location_id)');
        $this->addSql('CREATE TABLE account (id INT NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE merchant_product_offer (id INT NOT NULL, product_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, recommended BOOLEAN NOT NULL, type VARCHAR(255) NOT NULL, bundle_type VARCHAR(255) NOT NULL, percent_cost VARCHAR(255) NOT NULL, fixed_fee_amount INT NOT NULL, fixed_fee_currency VARCHAR(255) NOT NULL, created_at INT NOT NULL, updated_at INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5CB5F4704584665A ON merchant_product_offer (product_id)');
        $this->addSql('CREATE TABLE contract_details (id INT NOT NULL, contract_id INT DEFAULT NULL, product_id INT DEFAULT NULL, offer_id INT DEFAULT NULL, created_at INT NOT NULL, updated_at INT NOT NULL, deleted_at INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7A7776422576E0FD ON contract_details (contract_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7A7776424584665A ON contract_details (product_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7A77764253C674EE ON contract_details (offer_id)');
        $this->addSql('CREATE TABLE merchant (id INT NOT NULL, organisation_id INT DEFAULT NULL, companyId VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postalCode VARCHAR(255) NOT NULL, VATnumber INT NOT NULL, created_at INT NOT NULL, updated_at INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_74AB25E19E6B1585 ON merchant (organisation_id)');
        $this->addSql('CREATE TABLE poss (id INT NOT NULL, location_id INT DEFAULT NULL, bank_id INT DEFAULT NULL, device_id INT DEFAULT NULL, terminal_id VARCHAR(255) NOT NULL, created_at INT NOT NULL, updated_at INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C4EEF92E64D218E ON poss (location_id)');
        $this->addSql('CREATE INDEX IDX_C4EEF92E11C8FB41 ON poss (bank_id)');
        $this->addSql('CREATE INDEX IDX_C4EEF92E94A4C7D4 ON poss (device_id)');
        $this->addSql('CREATE TABLE activity (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE device (id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at INT NOT NULL, updated_at INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE bank (id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at INT NOT NULL, updated_at INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user_roles (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE contract (id INT NOT NULL, merchant_id INT DEFAULT NULL, address VARCHAR(255) NOT NULL, created_at INT NOT NULL, updated_at INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E98F28596796D554 ON contract (merchant_id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE merchant_product_offer_option ADD CONSTRAINT FK_98225B6953C674EE FOREIGN KEY (offer_id) REFERENCES merchant_product_offer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E99B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9D60322AC FOREIGN KEY (role_id) REFERENCES user_roles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E96796D554 FOREIGN KEY (merchant_id) REFERENCES merchant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_locations ADD CONSTRAINT FK_719B305BA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_locations ADD CONSTRAINT FK_719B305B64D218E FOREIGN KEY (location_id) REFERENCES location (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE merchant_product_offer ADD CONSTRAINT FK_5CB5F4704584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contract_details ADD CONSTRAINT FK_7A7776422576E0FD FOREIGN KEY (contract_id) REFERENCES contract (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contract_details ADD CONSTRAINT FK_7A7776424584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contract_details ADD CONSTRAINT FK_7A77764253C674EE FOREIGN KEY (offer_id) REFERENCES merchant_product_offer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE merchant ADD CONSTRAINT FK_74AB25E19E6B1585 FOREIGN KEY (organisation_id) REFERENCES organisation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE poss ADD CONSTRAINT FK_C4EEF92E64D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE poss ADD CONSTRAINT FK_C4EEF92E11C8FB41 FOREIGN KEY (bank_id) REFERENCES bank (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE poss ADD CONSTRAINT FK_C4EEF92E94A4C7D4 FOREIGN KEY (device_id) REFERENCES device (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F28596796D554 FOREIGN KEY (merchant_id) REFERENCES merchant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE location ADD merchant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE location ADD created_at INT NOT NULL');
        $this->addSql('ALTER TABLE location ADD updated_at INT NOT NULL');
        $this->addSql('ALTER TABLE location ALTER activity_id DROP NOT NULL');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBBC7683B1 FOREIGN KEY (bis_activity_id) REFERENCES activity (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB2D8D80A4 FOREIGN KEY (ter_activity_id) REFERENCES activity (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB6796D554 FOREIGN KEY (merchant_id) REFERENCES merchant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_5E9E89CB81C06096 ON location (activity_id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CBBC7683B1 ON location (bis_activity_id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB2D8D80A4 ON location (ter_activity_id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB6796D554 ON location (merchant_id)');
    }

    /**
     * Remove table.
     *
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
        $this->addSql('ALTER TABLE merchant_product_offer DROP CONSTRAINT FK_5CB5F4704584665A');
        $this->addSql('ALTER TABLE contract_details DROP CONSTRAINT FK_7A7776424584665A');
        $this->addSql('ALTER TABLE merchant DROP CONSTRAINT FK_74AB25E19E6B1585');
        $this->addSql('ALTER TABLE users_locations DROP CONSTRAINT FK_719B305BA76ED395');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E99B6B5FBA');
        $this->addSql('ALTER TABLE merchant_product_offer_option DROP CONSTRAINT FK_98225B6953C674EE');
        $this->addSql('ALTER TABLE contract_details DROP CONSTRAINT FK_7A77764253C674EE');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E96796D554');
        $this->addSql('ALTER TABLE location DROP CONSTRAINT FK_5E9E89CB6796D554');
        $this->addSql('ALTER TABLE contract DROP CONSTRAINT FK_E98F28596796D554');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD81C06096');
        $this->addSql('ALTER TABLE location DROP CONSTRAINT FK_5E9E89CB81C06096');
        $this->addSql('ALTER TABLE location DROP CONSTRAINT FK_5E9E89CBBC7683B1');
        $this->addSql('ALTER TABLE location DROP CONSTRAINT FK_5E9E89CB2D8D80A4');
        $this->addSql('ALTER TABLE poss DROP CONSTRAINT FK_C4EEF92E94A4C7D4');
        $this->addSql('ALTER TABLE poss DROP CONSTRAINT FK_C4EEF92E11C8FB41');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E9D60322AC');
        $this->addSql('ALTER TABLE contract_details DROP CONSTRAINT FK_7A7776422576E0FD');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE merchant_product_offer_option_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE organisation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE account_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE merchant_product_offer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE contract_details_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE merchant_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE poss_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE activity_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE device_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE bank_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_roles_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE contract_id_seq CASCADE');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE merchant_product_offer_option');
        $this->addSql('DROP TABLE organisation');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_locations');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE merchant_product_offer');
        $this->addSql('DROP TABLE contract_details');
        $this->addSql('DROP TABLE merchant');
        $this->addSql('DROP TABLE poss');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE device');
        $this->addSql('DROP TABLE bank');
        $this->addSql('DROP TABLE user_roles');
        $this->addSql('DROP TABLE contract');
        $this->addSql('DROP INDEX IDX_5E9E89CB81C06096');
        $this->addSql('DROP INDEX IDX_5E9E89CBBC7683B1');
        $this->addSql('DROP INDEX IDX_5E9E89CB2D8D80A4');
        $this->addSql('DROP INDEX IDX_5E9E89CB6796D554');
        $this->addSql('ALTER TABLE location DROP merchant_id');
        $this->addSql('ALTER TABLE location DROP created_at');
        $this->addSql('ALTER TABLE location DROP updated_at');
        $this->addSql('ALTER TABLE location ALTER activity_id SET NOT NULL');
    }
}
