<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180711085506 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE state (id INT AUTO_INCREMENT NOT NULL, state VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE announce ADD state_id INT NOT NULL');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD755D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('CREATE INDEX IDX_E6D6DD755D83CC1 ON announce (state_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD755D83CC1');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP INDEX IDX_E6D6DD755D83CC1 ON announce');
        $this->addSql('ALTER TABLE announce DROP state_id');
    }
}
