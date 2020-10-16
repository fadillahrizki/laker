<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%otp}}`.
 */
class m201016_085325_create_otp_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%otp}}', [
            'id' => $this->primaryKey(),
            'nomor_hp'=>$this->string(),
            'code'=>$this->string(),
            'action'=>$this->string(),
            'is_verified'=>$this->boolean()->defaultValue(0),
            'expired_date'=>$this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%otp}}');
    }
}
