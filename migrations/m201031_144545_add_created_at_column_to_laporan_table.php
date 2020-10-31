<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%laporan}}`.
 */
class m201031_144545_add_created_at_column_to_laporan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%laporan}}', 'created_at', $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%laporan}}', 'created_at');
    }
}
