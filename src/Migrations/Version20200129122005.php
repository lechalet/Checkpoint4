<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200129122005 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, profile_image VARCHAR(255) NOT NULL, story VARCHAR(255) NOT NULL, origin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, capacity VARCHAR(255) NOT NULL, place VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_actor (event_id INT NOT NULL, actor_id INT NOT NULL, INDEX IDX_56EE7D571F7E88B (event_id), INDEX IDX_56EE7D510DAF24A (actor_id), PRIMARY KEY(event_id, actor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_actor (skill_id INT NOT NULL, actor_id INT NOT NULL, INDEX IDX_615DC5C55585C142 (skill_id), INDEX IDX_615DC5C510DAF24A (actor_id), PRIMARY KEY(skill_id, actor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spectator (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, news_subscription TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, event_id INT NOT NULL, spectator_id INT NOT NULL, price VARCHAR(255) NOT NULL, INDEX IDX_97A0ADA371F7E88B (event_id), INDEX IDX_97A0ADA3523FB688 (spectator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_actor ADD CONSTRAINT FK_56EE7D571F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_actor ADD CONSTRAINT FK_56EE7D510DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_actor ADD CONSTRAINT FK_615DC5C55585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_actor ADD CONSTRAINT FK_615DC5C510DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA371F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3523FB688 FOREIGN KEY (spectator_id) REFERENCES spectator (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event_actor DROP FOREIGN KEY FK_56EE7D510DAF24A');
        $this->addSql('ALTER TABLE skill_actor DROP FOREIGN KEY FK_615DC5C510DAF24A');
        $this->addSql('ALTER TABLE event_actor DROP FOREIGN KEY FK_56EE7D571F7E88B');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA371F7E88B');
        $this->addSql('ALTER TABLE skill_actor DROP FOREIGN KEY FK_615DC5C55585C142');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3523FB688');
        $this->addSql('DROP TABLE actor');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_actor');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE skill_actor');
        $this->addSql('DROP TABLE spectator');
        $this->addSql('DROP TABLE ticket');
    }
}
