<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250624180311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SEQUENCE coupon_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SEQUENCE coupon_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE coupon (id INT NOT NULL, type_id INT NOT NULL, code VARCHAR(50) NOT NULL, discount NUMERIC(10, 2) NOT NULL, is_percentage BOOLEAN NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_64BF3F02C54C8C93 ON coupon (type_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE coupon_type (id INT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_CCE08B2B5E237E06 ON coupon_type (name)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE product (id INT NOT NULL, name VARCHAR(255) NOT NULL, base_price NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F02C54C8C93 FOREIGN KEY (type_id) REFERENCES coupon_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            DROP SEQUENCE coupon_id_seq CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP SEQUENCE coupon_type_id_seq CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP SEQUENCE product_id_seq CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE coupon DROP CONSTRAINT FK_64BF3F02C54C8C93
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE coupon
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE coupon_type
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE product
        SQL);
    }
}
