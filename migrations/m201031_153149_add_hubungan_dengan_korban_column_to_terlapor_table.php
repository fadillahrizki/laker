<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%terlapor}}`.
 */
class m201031_153149_add_hubungan_dengan_korban_column_to_terlapor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%terlapor}}', 'hubungan_dengan_korban', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%terlapor}}', 'hubungan_dengan_korban');
    }
}
