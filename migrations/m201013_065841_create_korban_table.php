<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%korban}}`.
 */
class m201013_065841_create_korban_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%korban}}', [
            'id' => $this->primaryKey(),
            'nama'=>$this->string(),
            'alamat'=>$this->text(),
            'usia'=>$this->integer(),
            'jenis_kelamin'=>$this->string(),
            'nomor_hp'=>$this->string()->unique(),
            'laporan_id'=>$this->integer()->notNull()
        ]);

        $this->createIndex(
            'idx-korban-laporan_id',
            'korban',
            'laporan_id'
        );

        $this->addForeignKey(
            'fk-korban-laporan_id',
            'korban',
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
            'fk-korban-laporan_id',
            'korban'
        );

        $this->dropIndex(
            'idx-korban-laporan_id',
            'korban'
        );

        $this->dropTable('{{%korban}}');
    }
}
