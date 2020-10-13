<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_kasus".
 *
 * @property int $id
 * @property string|null $nama
 *
 * @property Laporan[] $laporans
 */
class JenisKasus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_kasus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * Gets query for [[Laporans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporans()
    {
        return $this->hasMany(Laporan::className(), ['jenis_kasus_id' => 'id']);
    }
}
