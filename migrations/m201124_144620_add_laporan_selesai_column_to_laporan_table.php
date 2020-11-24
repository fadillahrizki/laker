<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%laporan}}`.
 */
class m201124_144620_add_laporan_selesai_column_to_laporan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%laporan}}', 'laporan_selesai', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%laporan}}', 'laporan_selesai');
    }
}
