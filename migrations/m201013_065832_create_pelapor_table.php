<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pelapor}}`.
 */
class m201013_065832_create_pelapor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pelapor}}', [
            'id' => $this->primaryKey(),
            'is_rahasia'=>$this->string(),
            'nama'=>$this->string(),
            'alamat'=>$this->text(),
            'usia'=>$this->integer(),
            'jenis_kelamin'=>$this->string(),
            'nomor_hp'=>$this->string(),
            'is_korban'=>$this->string(),
            'hubungan_dengan_korban'=>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pelapor}}');
    }
}
