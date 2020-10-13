<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jenis_kasus}}`.
 */
class m201013_062133_create_jenis_kasus_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jenis_kasus}}', [
            'id' => $this->primaryKey(),
            'nama'=>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jenis_kasus}}');
    }
}
