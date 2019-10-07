<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191004122607 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, city VARCHAR(50) NOT NULL, country VARCHAR(50) NOT NULL, infos TEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE events (id INT AUTO_INCREMENT NOT NULL, clubid INT DEFAULT NULL, name VARCHAR(255) NOT NULL, info TEXT NOT NULL, type INT NOT NULL, start_date TIME NOT NULL, end_date TIME NOT NULL, INDEX club (clubid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event2user (eventid INT NOT NULL, userid INT NOT NULL, INDEX IDX_F3FA291EBEAA9FCE (eventid), INDEX IDX_F3FA291EF132696E (userid), PRIMARY KEY(eventid, userid)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_groups (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, clubid INT DEFAULT NULL, fname VARCHAR(100) NOT NULL, lname VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, phone VARCHAR(100) NOT NULL, address VARCHAR(100) NOT NULL, INDEX clubid (clubid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user2groups (userid INT NOT NULL, groupid INT NOT NULL, INDEX IDX_7F5E0F68F132696E (userid), INDEX IDX_7F5E0F687805AC12 (groupid), PRIMARY KEY(userid, groupid)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, test VARCHAR(2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A8A327C54 FOREIGN KEY (clubid) REFERENCES club (id)');
        $this->addSql('ALTER TABLE event2user ADD CONSTRAINT FK_F3FA291EBEAA9FCE FOREIGN KEY (eventid) REFERENCES events (id)');
        $this->addSql('ALTER TABLE event2user ADD CONSTRAINT FK_F3FA291EF132696E FOREIGN KEY (userid) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E98A327C54 FOREIGN KEY (clubid) REFERENCES club (id)');
        $this->addSql('ALTER TABLE user2groups ADD CONSTRAINT FK_7F5E0F68F132696E FOREIGN KEY (userid) REFERENCES users (id)');
        $this->addSql('ALTER TABLE user2groups ADD CONSTRAINT FK_7F5E0F687805AC12 FOREIGN KEY (groupid) REFERENCES user_groups (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A8A327C54');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E98A327C54');
        $this->addSql('ALTER TABLE event2user DROP FOREIGN KEY FK_F3FA291EBEAA9FCE');
        $this->addSql('ALTER TABLE user2groups DROP FOREIGN KEY FK_7F5E0F687805AC12');
        $this->addSql('ALTER TABLE event2user DROP FOREIGN KEY FK_F3FA291EF132696E');
        $this->addSql('ALTER TABLE user2groups DROP FOREIGN KEY FK_7F5E0F68F132696E');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE events');
        $this->addSql('DROP TABLE event2user');
        $this->addSql('DROP TABLE user_groups');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE user2groups');
        $this->addSql('DROP TABLE test');
    }
}
