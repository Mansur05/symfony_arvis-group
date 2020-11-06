<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201106165841 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE branch (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, company_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, description CLOB NOT NULL)');
        $this->addSql('CREATE INDEX IDX_BB861B1F979B1AD6 ON branch (company_id)');
        $this->addSql('CREATE TABLE company (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE employee (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, branch_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, position VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_5D9F75A1DCD6CC49 ON employee (branch_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE branch');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE employee');
    }
}
