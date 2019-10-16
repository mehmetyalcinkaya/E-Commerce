<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181208154304 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, parentid INT NOT NULL, title VARCHAR(30) NOT NULL, keywords VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, status VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(150) DEFAULT NULL, keywords VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, type VARCHAR(20) DEFAULT NULL, brand_id INT DEFAULT NULL, amount INT DEFAULT NULL, pprice DOUBLE PRECISION DEFAULT NULL, sprice DOUBLE PRECISION DEFAULT NULL, min INT DEFAULT NULL, detail LONGTEXT DEFAULT NULL, image VARCHAR(150) DEFAULT NULL, category_id INT DEFAULT NULL, user_id INT DEFAULT NULL, status VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(100) NOT NULL, phone VARCHAR(11) NOT NULL, city VARCHAR(20) NOT NULL, type VARCHAR(10) NOT NULL, status VARCHAR(10) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, image VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE categoryx');
        $this->addSql('DROP TABLE productx');
        $this->addSql('DROP TABLE usersx');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categoryx (id INT AUTO_INCREMENT NOT NULL, parentid INT NOT NULL, title VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, keywords VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, description VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(10) NOT NULL COLLATE utf8mb4_unicode_ci, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE productx (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(150) DEFAULT NULL COLLATE utf8mb4_unicode_ci, keywords VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, description VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, type VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci, brand_id INT DEFAULT NULL, amount INT DEFAULT NULL, pprice DOUBLE PRECISION DEFAULT NULL, sprice DOUBLE PRECISION DEFAULT NULL, min INT DEFAULT NULL, detail LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, image VARCHAR(150) DEFAULT NULL COLLATE utf8mb4_unicode_ci, category_id INT DEFAULT NULL, user_id INT DEFAULT NULL, status VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usersx (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, password VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, phone VARCHAR(11) NOT NULL COLLATE utf8mb4_unicode_ci, city VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, type VARCHAR(10) NOT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(10) NOT NULL COLLATE utf8mb4_unicode_ci, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE image');
    }
}
