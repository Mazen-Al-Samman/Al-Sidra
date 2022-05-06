<?php

use yii\db\Migration;

/**
 * Class m220505_191643_creae_members_table
 */
class m220505_191643_creae_members_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(<<< SQL
            CREATE TABLE member (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) NOT NULL,
                email VARCHAR(255) UNIQUE NOT NULL,
                status TINYINT DEFAULT 1,
                phone VARCHAR(255) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                auth_key VARCHAR(32),
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
        $this->dropTable('member');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220505_191643_creae_members_table cannot be reverted.\n";

        return false;
    }
    */
}
