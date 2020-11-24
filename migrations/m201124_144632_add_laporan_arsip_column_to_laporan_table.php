<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%laporan}}`.
 */
class m201124_144632_add_laporan_arsip_column_to_laporan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%laporan}}', 'laporan_arsip', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%laporan}}', 'laporan_arsip');
    }
}
