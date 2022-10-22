<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221022180807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE customer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ord_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE customer (id INT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE ord (id INT NOT NULL, customer_id INT NOT NULL, sum DOUBLE PRECISION NOT NULL, status SMALLINT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EB1CEB3A9395C3F3 ON ord (customer_id)');
        $this->addSql('CREATE TABLE ord_product (ord_id INT NOT NULL, product_id INT NOT NULL, count INT NOT NULL, PRIMARY KEY(ord_id, product_id))');
        $this->addSql('CREATE INDEX IDX_99B86CA6E636D3F5 ON ord_product (ord_id)');
        $this->addSql('CREATE INDEX IDX_99B86CA64584665A ON ord_product (product_id)');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE ord ADD CONSTRAINT FK_EB1CEB3A9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ord_product ADD CONSTRAINT FK_99B86CA6E636D3F5 FOREIGN KEY (ord_id) REFERENCES ord (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ord_product ADD CONSTRAINT FK_99B86CA64584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE customer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ord_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('ALTER TABLE ord DROP CONSTRAINT FK_EB1CEB3A9395C3F3');
        $this->addSql('ALTER TABLE ord_product DROP CONSTRAINT FK_99B86CA6E636D3F5');
        $this->addSql('ALTER TABLE ord_product DROP CONSTRAINT FK_99B86CA64584665A');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE ord');
        $this->addSql('DROP TABLE ord_product');
        $this->addSql('DROP TABLE product');
    }
}
