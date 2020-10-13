<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pengaturan}}`.
 */
class m201013_073414_create_pengaturan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pengaturan}}', [
            'id' => $this->primaryKey(),
            'sms_user'=>$this->string(),
            'sms_password'=>$this->string(),
            'sms_no_admin'=>$this->string(),
            'konten_admin'=>$this->string(),
            'konten_user_masuk'=>$this->text(),
            'konten_user_tindak_lanjut'=>$this->text(),
            'konten_selesai'=>$this->text(),
            'konten_kembali'=>$this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pengaturan}}');
    }
}
