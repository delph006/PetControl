<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190914232054 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pet CHANGE user_id user_id INT DEFAULT NULL, CHANGE type_id type_id INT DEFAULT NULL, CHANGE sexe_id sexe_id INT DEFAULT NULL, CHANGE number_puce number_puce INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE adopt_date adopt_date DATETIME DEFAULT NULL, CHANGE strerilisy sterilisy TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE role_id role_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pet CHANGE user_id user_id INT DEFAULT NULL, CHANGE type_id type_id INT DEFAULT NULL, CHANGE sexe_id sexe_id INT DEFAULT NULL, CHANGE number_puce number_puce INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE adopt_date adopt_date DATETIME DEFAULT \'NULL\', CHANGE sterilisy strerilisy TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE role_id role_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
    }
}
