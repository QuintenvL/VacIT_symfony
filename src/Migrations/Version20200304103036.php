<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200304103036 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bedrijf (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(100) NOT NULL, plaats VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE soort (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(50) NOT NULL, icon VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vacature (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, soort_id INT NOT NULL, bedrijf_id INT NOT NULL, titel VARCHAR(50) NOT NULL, beschrijving VARCHAR(1000) NOT NULL, datum DATE NOT NULL, plaats VARCHAR(30) NOT NULL, INDEX IDX_9E5830F5B3E9C81 (niveau_id), INDEX IDX_9E5830F53DEE50DF (soort_id), INDEX IDX_9E5830F5740E9210 (bedrijf_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vacature ADD CONSTRAINT FK_9E5830F5B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE vacature ADD CONSTRAINT FK_9E5830F53DEE50DF FOREIGN KEY (soort_id) REFERENCES soort (id)');
        $this->addSql('ALTER TABLE vacature ADD CONSTRAINT FK_9E5830F5740E9210 FOREIGN KEY (bedrijf_id) REFERENCES bedrijf (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vacature DROP FOREIGN KEY FK_9E5830F5740E9210');
        $this->addSql('ALTER TABLE vacature DROP FOREIGN KEY FK_9E5830F5B3E9C81');
        $this->addSql('ALTER TABLE vacature DROP FOREIGN KEY FK_9E5830F53DEE50DF');
        $this->addSql('DROP TABLE bedrijf');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE soort');
        $this->addSql('DROP TABLE vacature');
    }
}
