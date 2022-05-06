<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%real_estate_rating}}`.
 */
class m220506_183846_create_real_estate_rating_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(<<< SQL
            CREATE TABLE real_estate_rating (
                id INT AUTO_INCREMENT PRIMARY KEY,
                member_id INT NOT NULL,
                customer_name VARCHAR(255) NOT NULL,
                phone VARCHAR(20) NOT NULL,
                real_estate_type VARCHAR(255) NOT NULL,
                reporter_name VARCHAR(255) NOT NULL,
                real_estate_location VARCHAR(255) NOT NULL,
                reason VARCHAR(255) NOT NULL,
                status TINYINT DEFAULT 1,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
            );
SQL
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%real_estate_rating}}');
    }
}
