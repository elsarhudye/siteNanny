<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210809134158 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, reserved_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, start_time DATETIME NOT NULL, INDEX IDX_10C31F86B03A8386 (created_by_id), INDEX IDX_10C31F86BCDB4AF4 (reserved_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86B03A8386 FOREIGN KEY (created_by_id) REFERENCES nanny (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86BCDB4AF4 FOREIGN KEY (reserved_by_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rdv');
    }
}
