<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%terlapor}}`.
 */
class m201013_065848_create_terlapor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%terlapor}}', [
            'id' => $this->primaryKey(),
            'nama'=>$this->string(),
            'alamat'=>$this->text(),
            'usia'=>$this->integer(),
            'jenis_kelamin'=>$this->string(),
            'nomor_hp'=>$this->string()->unique(),
            'laporan_id'=>$this->integer()->notNull()
        ]);

        $this->createIndex(
            'idx-terlapor-laporan_id',
            'terlapor',
            'laporan_id'
        );

        $this->addForeignKey(
            'fk-terlapor-laporan_id',
            'terlapor',
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
            'fk-terlapor-laporan_id',
            'terlapor'
        );

        $this->dropIndex(
            'idx-terlapor-laporan_id',
            'terlapor'
        );

        $this->dropTable('{{%terlapor}}');
    }
}
