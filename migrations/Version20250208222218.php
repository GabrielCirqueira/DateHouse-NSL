<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250208222218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aluno (id INT AUTO_INCREMENT NOT NULL, turma_id INT NOT NULL, turno_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, INDEX IDX_67C97100CEBA2CFD (turma_id), INDEX IDX_67C9710069C5211E (turno_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disciplina (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE turma (id INT AUTO_INCREMENT NOT NULL, turno_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, serie INT NOT NULL, curso VARCHAR(255) NOT NULL, INDEX IDX_2B0219A669C5211E (turno_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE turno (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aluno ADD CONSTRAINT FK_67C97100CEBA2CFD FOREIGN KEY (turma_id) REFERENCES turma (id)');
        $this->addSql('ALTER TABLE aluno ADD CONSTRAINT FK_67C9710069C5211E FOREIGN KEY (turno_id) REFERENCES turno (id)');
        $this->addSql('ALTER TABLE turma ADD CONSTRAINT FK_2B0219A669C5211E FOREIGN KEY (turno_id) REFERENCES turno (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aluno DROP FOREIGN KEY FK_67C97100CEBA2CFD');
        $this->addSql('ALTER TABLE aluno DROP FOREIGN KEY FK_67C9710069C5211E');
        $this->addSql('ALTER TABLE turma DROP FOREIGN KEY FK_2B0219A669C5211E');
        $this->addSql('DROP TABLE aluno');
        $this->addSql('DROP TABLE disciplina');
        $this->addSql('DROP TABLE turma');
        $this->addSql('DROP TABLE turno');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
