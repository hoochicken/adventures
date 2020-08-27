<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200827181158 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE testy (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, state INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE hero_type');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item2hero');
        $this->addSql('DROP TABLE item_type');
        $this->addSql('DROP TABLE route');
        $this->addSql('ALTER TABLE hero DROP created, DROP created_user, DROP updated, DROP updated_user, DROP deleted, DROP deleted_user, CHANGE description description VARCHAR(1023) NOT NULL, CHANGE ae ae INT NOT NULL, CHANGE ae_current ae_current INT NOT NULL, CHANGE attributes attributes VARCHAR(1023) NOT NULL, CHANGE state state INT NOT NULL');
        $this->addSql('ALTER TABLE hero_class DROP created, DROP created_user, DROP updated, DROP updated_user, DROP deleted, DROP deleted_user, CHANGE attributes attributes VARCHAR(255) NOT NULL, CHANGE state state INT NOT NULL');
        $this->addSql('ALTER TABLE place CHANGE attributes attributes VARCHAR(1023) NOT NULL, CHANGE state state INT NOT NULL, CHANGE created created DATETIME NOT NULL, CHANGE created_user created_user INT NOT NULL, CHANGE updated updated DATETIME NOT NULL, CHANGE updated_user updated_user INT NOT NULL, CHANGE deleted deleted DATETIME NOT NULL, CHANGE deleted_user deleted_user INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, label VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, description VARCHAR(1023) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, attributes VARCHAR(1023) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, state TINYINT(1) DEFAULT \'1\' NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, created_user INT DEFAULT 0 NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_user INT DEFAULT 0 NOT NULL, deleted DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, deleted_user INT DEFAULT 0 NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE hero_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, attributes VARCHAR(1023) CHARACTER SET utf8mb4 DEFAULT \'{}\' NOT NULL COLLATE `utf8mb4_0900_ai_ci`, state TINYINT(1) DEFAULT \'1\' NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, created_user INT DEFAULT 0 NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_user INT DEFAULT 0 NOT NULL, deleted DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, deleted_user INT DEFAULT 0 NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, decription VARCHAR(1023) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, itemtype INT NOT NULL, pic VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, worth DOUBLE PRECISION NOT NULL, weight DOUBLE PRECISION NOT NULL, attributes VARCHAR(1023) CHARACTER SET utf8mb4 DEFAULT \'{}\' NOT NULL COLLATE `utf8mb4_0900_ai_ci`, state TINYINT(1) DEFAULT \'1\' NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, created_user INT DEFAULT 0 NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_user INT DEFAULT 0 NOT NULL, deleted DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, deleted_user INT DEFAULT 0 NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE item2hero (item_id INT NOT NULL, hero_id INT NOT NULL, attributes VARCHAR(1023) CHARACTER SET utf8mb4 DEFAULT \'{}\' NOT NULL COLLATE `utf8mb4_0900_ai_ci`, state TINYINT(1) DEFAULT \'1\' NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, created_user INT DEFAULT 0 NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_user INT DEFAULT 0 NOT NULL, deleted DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, deleted_user INT DEFAULT 0 NOT NULL) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE item_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, attributes VARCHAR(1023) CHARACTER SET utf8mb4 DEFAULT \'{}\' NOT NULL COLLATE `utf8mb4_0900_ai_ci`, state TINYINT(1) DEFAULT \'1\' NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, created_user INT DEFAULT 0 NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_user INT DEFAULT 0 NOT NULL, deleted DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, deleted_user INT DEFAULT 0 NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE route (id INT AUTO_INCREMENT NOT NULL, `out` INT NOT NULL, `in` INT NOT NULL, out_direction INT NOT NULL, attributes VARCHAR(1023) CHARACTER SET utf8mb4 DEFAULT \'{}\' NOT NULL COLLATE `utf8mb4_0900_ai_ci`, state TINYINT(1) DEFAULT \'1\' NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, created_user INT DEFAULT 0 NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_user INT DEFAULT 0 NOT NULL, deleted DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, deleted_user INT DEFAULT 0 NOT NULL, UNIQUE INDEX `in` (`in`, out_direction), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE testy');
        $this->addSql('ALTER TABLE hero ADD created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ADD created_user INT DEFAULT 0 NOT NULL, ADD updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ADD updated_user INT DEFAULT 0 NOT NULL, ADD deleted DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ADD deleted_user INT DEFAULT 0 NOT NULL, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE ae ae INT DEFAULT 0 NOT NULL, CHANGE ae_current ae_current INT DEFAULT 0 NOT NULL, CHANGE attributes attributes VARCHAR(1023) CHARACTER SET utf8mb4 DEFAULT \'{}\' NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE state state TINYINT(1) DEFAULT \'1\' NOT NULL');
        $this->addSql('ALTER TABLE hero_class ADD created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ADD created_user INT DEFAULT 0 NOT NULL, ADD updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ADD updated_user INT DEFAULT 0 NOT NULL, ADD deleted DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ADD deleted_user INT DEFAULT 0 NOT NULL, CHANGE attributes attributes VARCHAR(1023) CHARACTER SET utf8mb4 DEFAULT \'{}\' NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE state state TINYINT(1) DEFAULT \'1\' NOT NULL');
        $this->addSql('ALTER TABLE place CHANGE attributes attributes VARCHAR(1023) CHARACTER SET utf8mb4 DEFAULT \'{}\' NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE state state TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE created created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE created_user created_user INT DEFAULT 0 NOT NULL, CHANGE updated updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE updated_user updated_user INT DEFAULT 0 NOT NULL, CHANGE deleted deleted DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE deleted_user deleted_user INT DEFAULT 0 NOT NULL');
    }
}
