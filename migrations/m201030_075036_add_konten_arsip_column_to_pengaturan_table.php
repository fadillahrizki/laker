<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%pengaturan}}`.
 */
class m201030_075036_add_konten_arsip_column_to_pengaturan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%pengaturan}}', 'konten_arsip', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%pengaturan}}', 'konten_arsip');
    }
}
