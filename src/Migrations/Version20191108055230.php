<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191108055230 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__task AS SELECT id, title, points, is_done, parent_id, user_id FROM task');
        $this->addSql('DROP TABLE task');
        $this->addSql('CREATE TABLE task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(50) NOT NULL COLLATE BINARY, points INTEGER NOT NULL, is_done BOOLEAN NOT NULL, user_id VARCHAR(255) NOT NULL COLLATE BINARY, parent_id VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO task (id, title, points, is_done, parent_id, user_id) SELECT id, title, points, is_done, parent_id, user_id FROM __temp__task');
        $this->addSql('DROP TABLE __temp__task');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, first_name, last_name, email, created_at, updated_at FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER NOT NULL, first_name VARCHAR(50) NOT NULL COLLATE BINARY, last_name VARCHAR(50) NOT NULL COLLATE BINARY, email VARCHAR(50) NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO user (id, first_name, last_name, email, created_at, updated_at) SELECT id, first_name, last_name, email, created_at, updated_at FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__task AS SELECT id, parent_id, user_id, title, points, is_done FROM task');
        $this->addSql('DROP TABLE task');
        $this->addSql('CREATE TABLE task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id VARCHAR(255) NOT NULL, title VARCHAR(50) NOT NULL, points INTEGER NOT NULL, is_done BOOLEAN NOT NULL, parent_id VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO task (id, parent_id, user_id, title, points, is_done) SELECT id, parent_id, user_id, title, points, is_done FROM __temp__task');
        $this->addSql('DROP TABLE __temp__task');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, first_name, last_name, email, created_at, updated_at FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL)');
        $this->addSql('INSERT INTO user (id, first_name, last_name, email, created_at, updated_at) SELECT id, first_name, last_name, email, created_at, updated_at FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }
}
