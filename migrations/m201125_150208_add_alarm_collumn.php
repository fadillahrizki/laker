<?php

use yii\db\Migration;

/**
 * Class m201125_150208_add_alarm_collumn
 */
class m201125_150208_add_alarm_collumn extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%pengaturan}}', 'alarm_file', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%pengaturan}}', 'alarm_file');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201125_150208_add_alarm_collumn cannot be reverted.\n";

        return false;
    }
    */
}
