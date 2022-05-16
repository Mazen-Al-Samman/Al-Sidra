<?php

use yii\db\Migration;

/**
 * Class m220511_183143_creare_banner_image_table
 */
class m220511_183143_creare_banner_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(<<< SQL
            CREATE TABLE banner_image (
            id INT AUTO_INCREMENT PRIMARY KEY,
            img_name VARCHAR(255) NOT NULL
          );
SQL
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220511_183143_creare_banner_image_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220511_183143_creare_banner_image_table cannot be reverted.\n";

        return false;
    }
    */
}
