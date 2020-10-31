<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%laporan}}`.
 */
class m201013_065833_create_laporan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%laporan}}', [
            'id' => $this->string(8)->notNull(),
            'pelapor_id'=>$this->integer()->notNull(),
            'jenis_kasus_id'=>$this->integer()->notNull(),
            'kronologi'=>$this->text(),
            'status'=>$this->string()
        ]);

        $this->addPrimaryKey('laporan_pk','laporan',['id']);

        $this->createIndex(
            'idx-laporan-pelapor_id',
            'laporan',
            'pelapor_id'
        );

        $this->addForeignKey(
            'fk-laporan-pelapor_id',
            'laporan',
            'pelapor_id',
            'pelapor',
            'id',
        );

        $this->createIndex(
            'idx-laporan-jenis_kasus_id',
            'laporan',
            'jenis_kasus_id'
        );

        $this->addForeignKey(
            'fk-laporan-jenis_kasus_id',
            'laporan',
            'jenis_kasus_id',
            'jenis_kasus',
            'id', 
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'fk-laporan-pelapor_id',
            'laporan'
        );

        $this->dropIndex(
            'idx-laporan-pelapor_id',
            'laporan'
        );

        $this->dropForeignKey(
            'fk-laporan-jenis_kasus_id',
            'laporan'
        );

        $this->dropIndex(
            'idx-laporan-jenis_kasus_id',
            'laporan'
        );

        $this->dropTable('{{%laporan}}');
    }
}
