<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200313093931 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE kandidaat_vacature (id INT AUTO_INCREMENT NOT NULL, kandidaat_id INT NOT NULL, vacature_id INT NOT NULL, uitgenodigd TINYINT(1) NOT NULL, INDEX IDX_3F9A5E75D714D977 (kandidaat_id), INDEX IDX_3F9A5E756FB89BA0 (vacature_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE kandidaat_vacature ADD CONSTRAINT FK_3F9A5E75D714D977 FOREIGN KEY (kandidaat_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE kandidaat_vacature ADD CONSTRAINT FK_3F9A5E756FB89BA0 FOREIGN KEY (vacature_id) REFERENCES vacature (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE kandidaat_vacature');
    }
}
