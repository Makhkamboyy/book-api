<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220605192730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create relation to Book with picture';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books ADD picture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92EE45BDBF FOREIGN KEY (picture_id) REFERENCES media_object (id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A92EE45BDBF ON books (picture_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A92EE45BDBF');
        $this->addSql('DROP INDEX IDX_4A1B2A92EE45BDBF ON books');
        $this->addSql('ALTER TABLE books DROP picture_id');
    }
}
