<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%laporan}}`.
 */
class m201124_144604_add_laporan_masuk_column_to_laporan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%laporan}}', 'laporan_masuk', $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%laporan}}', 'laporan_masuk');
    }
}
