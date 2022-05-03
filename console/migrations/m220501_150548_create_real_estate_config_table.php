<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%real_estate_config}}`.
 */
class m220501_150548_create_real_estate_config_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(<<< SQL
            CREATE TABLE real_estate_config (
                id INT AUTO_INCREMENT PRIMARY KEY,
                real_estate_id INT NOT NULL,
                cards JSON
            )
SQL
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%real_estate_config}}');
    }
}
