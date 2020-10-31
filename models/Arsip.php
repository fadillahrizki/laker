<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "arsip".
 *
 * @property int $id
 * @property int $laporan_id
 * @property string|null $alasan
 *
 * @property Pelapor $laporan
 */
class Arsip extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'arsip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['laporan_id','alasan'], 'required','message'=>'{attribute} tidak boleh kosong!'   ],
            [['alasan','laporan_id'], 'string'],
            [['laporan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Laporan::className(), 'targetAttribute' => ['laporan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'laporan_id' => 'Laporan ID',
            'alasan' => 'Alasan',
        ];
    }

    /**
     * Gets query for [[Laporan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporan()
    {
        return $this->hasOne(Pelapor::className(), ['id' => 'laporan_id']);
    }
}
