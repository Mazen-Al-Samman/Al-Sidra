<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%real_estates}}`.
 */
class m220504_134050_create_real_estates_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(<<< SQL
            CREATE TABLE real_estate (
                id INT AUTO_INCREMENT PRIMARY KEY,
                member_id INT NOT NULL,
                contract_type VARCHAR(255) NOT NULL,
                real_estate_type VARCHAR(255) NOT NULL,
                address VARCHAR(255) NOT NULL,
                city VARCHAR(255) NOT NULL,
                neighborhood VARCHAR(255) NOT NULL,
                street VARCHAR(255) NOT NULL,
                num_of_interfaces INT NOT NULL,
                num_of_streets INT NOT NULL,
                price FLOAT NOT NULL,
                area FLOAT NOT NULL,
                customer_name VARCHAR(255) NOT NULL,
                phone VARCHAR(255) NOT NULL,
                notes VARCHAR(255) NOT NULL
            )
SQL
);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%real_estates}}');
    }
}
