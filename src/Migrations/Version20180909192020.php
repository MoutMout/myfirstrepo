<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180909192020 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE merchant_product_offer_option_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE merchant_product_offer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE activity_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, activity_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, image_url VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D34A04AD81C06096 ON product (activity_id)');
        $this->addSql('CREATE TABLE merchant_product_offer_option (id INT NOT NULL, offer_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, percent_cost VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_98225B6953C674EE ON merchant_product_offer_option (offer_id)');
        $this->addSql('CREATE TABLE merchant_product_offer (id INT NOT NULL, product_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, recommended BOOLEAN NOT NULL, type VARCHAR(255) NOT NULL, bundle_type VARCHAR(255) NOT NULL, percent_cost VARCHAR(255) NOT NULL, fixed_fee_amount INT NOT NULL, fixed_fee_currency VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5CB5F4704584665A ON merchant_product_offer (product_id)');
        $this->addSql('CREATE TABLE activity (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE merchant_product_offer_option ADD CONSTRAINT FK_98225B6953C674EE FOREIGN KEY (offer_id) REFERENCES merchant_product_offer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE merchant_product_offer ADD CONSTRAINT FK_5CB5F4704584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE merchant_product_offer DROP CONSTRAINT FK_5CB5F4704584665A');
        $this->addSql('ALTER TABLE merchant_product_offer_option DROP CONSTRAINT FK_98225B6953C674EE');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD81C06096');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE merchant_product_offer_option_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE merchant_product_offer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE activity_id_seq CASCADE');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE merchant_product_offer_option');
        $this->addSql('DROP TABLE merchant_product_offer');
        $this->addSql('DROP TABLE activity');
    }
}
