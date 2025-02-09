<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250209043753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE curso (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE turma ADD curso_id INT DEFAULT NULL, DROP curso');
        $this->addSql('ALTER TABLE turma ADD CONSTRAINT FK_2B0219A687CB4A1F FOREIGN KEY (curso_id) REFERENCES curso (id)');
        $this->addSql('CREATE INDEX IDX_2B0219A687CB4A1F ON turma (curso_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE turma DROP FOREIGN KEY FK_2B0219A687CB4A1F');
        $this->addSql('DROP TABLE curso');
        $this->addSql('DROP INDEX IDX_2B0219A687CB4A1F ON turma');
        $this->addSql('ALTER TABLE turma ADD curso VARCHAR(255) NOT NULL, DROP curso_id');
    }
}
