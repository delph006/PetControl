<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190915091818 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pet_weight (pet_id INT NOT NULL, weight_id INT NOT NULL, INDEX IDX_48BFDBD3966F7FB6 (pet_id), INDEX IDX_48BFDBD3350035DC (weight_id), PRIMARY KEY(pet_id, weight_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pet_weight ADD CONSTRAINT FK_48BFDBD3966F7FB6 FOREIGN KEY (pet_id) REFERENCES pet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pet_weight ADD CONSTRAINT FK_48BFDBD3350035DC FOREIGN KEY (weight_id) REFERENCES weight (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pet CHANGE user_id user_id INT DEFAULT NULL, CHANGE type_id type_id INT DEFAULT NULL, CHANGE sexe_id sexe_id INT DEFAULT NULL, CHANGE number_puce number_puce INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE adopt_date adopt_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE role_id role_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE pet_weight');
        $this->addSql('ALTER TABLE pet CHANGE user_id user_id INT DEFAULT NULL, CHANGE type_id type_id INT DEFAULT NULL, CHANGE sexe_id sexe_id INT DEFAULT NULL, CHANGE number_puce number_puce INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE adopt_date adopt_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE role_id role_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
    }
}
