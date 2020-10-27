<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%arsip}}`.
 */
class m201013_070729_create_arsip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%arsip}}', [
            'id' => $this->primaryKey(),
            'laporan_id'=>$this->integer()->notNull(),
            'alasan'=>$this->text(),
        ]);

        $this->createIndex(
            'idx-arsip-laporan_id',
            'arsip',
            'laporan_id'
        );

        $this->addForeignKey(
            'fk-arsip-laporan_id',
            'arsip',
            'laporan_id',
            'laporan',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-arsip-laporan_id',
            'arsip'
        );

        $this->dropIndex(
            'idx-arsip-laporan_id',
            'arsip'
        );

        $this->dropTable('{{%arsip}}');
    }
}
