<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%real_estate_marketing}}`.
 */
class m220506_201003_create_real_estate_marketing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(<<< SQL
            CREATE TABLE real_estate_marketing (
                id INT AUTO_INCREMENT PRIMARY KEY,
                member_id INT NOT NULL,
                customer_name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                phone VARCHAR(20) NOT NULL,
                real_estate_location VARCHAR(255) NOT NULL,
                real_estate_type VARCHAR(255) NOT NULL,
                report_img VARCHAR(255),
                real_estate_img VARCHAR(255),
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
        $this->dropTable('{{%real_estate_marketing}}');
    }
}
