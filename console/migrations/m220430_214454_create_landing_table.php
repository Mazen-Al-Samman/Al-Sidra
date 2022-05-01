<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%landing}}`.
 */
class m220430_214454_create_landing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(<<< SQL
            CREATE TABLE landing (
                `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `slug` VARCHAR(255) NOT NULL,
                `img` VARCHAR(255),
                `main_text` VARCHAR(255),
                `body` VARCHAR(255),
                `phone` VARCHAR(255),
                `has_whatsapp` TINYINT DEFAULT 1,
                CONSTRAINT unique_slug UNIQUE (`slug`),
                KEY (slug)
            );
SQL
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%landing}}');
    }
}
