<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191028151541 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE department_project_people (department_id INT NOT NULL, project_people_id INT NOT NULL, INDEX IDX_65C2CFA9AE80F5DF (department_id), INDEX IDX_65C2CFA9207B8CE1 (project_people_id), PRIMARY KEY(department_id, project_people_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE department_project_people ADD CONSTRAINT FK_65C2CFA9AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE department_project_people ADD CONSTRAINT FK_65C2CFA9207B8CE1 FOREIGN KEY (project_people_id) REFERENCES project_people (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE department ADD company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE department ADD CONSTRAINT FK_CD1DE18A979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_CD1DE18A979B1AD6 ON department (company_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE department_project_people');
        $this->addSql('ALTER TABLE department DROP FOREIGN KEY FK_CD1DE18A979B1AD6');
        $this->addSql('DROP INDEX IDX_CD1DE18A979B1AD6 ON department');
        $this->addSql('ALTER TABLE department DROP company_id');
    }
}
