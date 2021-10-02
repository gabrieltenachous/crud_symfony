<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210925142737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inputs (id INT AUTO_INCREMENT NOT NULL, product_id_id INT DEFAULT NULL, after_amount NUMERIC(8, 2) NOT NULL, before_amount NUMERIC(8, 2) NOT NULL, amount INT NOT NULL, unitary_value NUMERIC(8, 2) NOT NULL, date DATE NOT NULL, total_value NUMERIC(8, 2) NOT NULL, INDEX IDX_361A04EDE18E50B (product_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, amount INT NOT NULL, code INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profiles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sale_products (id INT AUTO_INCREMENT NOT NULL, sale_id_id INT DEFAULT NULL, product_id_id INT DEFAULT NULL, after_amount NUMERIC(8, 2) NOT NULL, amount INT NOT NULL, before_amount NUMERIC(8, 2) NOT NULL, unitary_value NUMERIC(8, 2) NOT NULL, total_value NUMERIC(8, 2) NOT NULL, INDEX IDX_ADCEB6F0AF98C6D4 (sale_id_id), INDEX IDX_ADCEB6F0DE18E50B (product_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sales (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, date DATE NOT NULL, total_value NUMERIC(8, 2) NOT NULL, INDEX IDX_6B8170449D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, profile_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_1483A5E988900185 (profile_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inputs ADD CONSTRAINT FK_361A04EDE18E50B FOREIGN KEY (product_id_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE sale_products ADD CONSTRAINT FK_ADCEB6F0AF98C6D4 FOREIGN KEY (sale_id_id) REFERENCES sales (id)');
        $this->addSql('ALTER TABLE sale_products ADD CONSTRAINT FK_ADCEB6F0DE18E50B FOREIGN KEY (product_id_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B8170449D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E988900185 FOREIGN KEY (profile_id_id) REFERENCES profiles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inputs DROP FOREIGN KEY FK_361A04EDE18E50B');
        $this->addSql('ALTER TABLE sale_products DROP FOREIGN KEY FK_ADCEB6F0DE18E50B');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E988900185');
        $this->addSql('ALTER TABLE sale_products DROP FOREIGN KEY FK_ADCEB6F0AF98C6D4');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B8170449D86650F');
        $this->addSql('DROP TABLE inputs');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE profiles');
        $this->addSql('DROP TABLE sale_products');
        $this->addSql('DROP TABLE sales');
        $this->addSql('DROP TABLE users');
    }
}
