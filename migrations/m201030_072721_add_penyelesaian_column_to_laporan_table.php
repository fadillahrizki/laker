<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%laporan}}`.
 */
class m201030_072721_add_penyelesaian_column_to_laporan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%laporan}}', 'penyelesaian', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%laporan}}', 'penyelesaian');
    }
}
