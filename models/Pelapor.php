<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelapor".
 *
 * @property int $id
 * @property int|null $is_rahasia
 * @property string|null $nama
 * @property string|null $alamat
 * @property int|null $usia
 * @property string|null $jenis_kelamin
 * @property string|null $nomor_hp
 * @property int|null $is_korban
 * @property string|null $hubungan_dengan_korban
 *
 * @property Arsip[] $arsips
 * @property Laporan[] $laporans
 */
class Pelapor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelapor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_rahasia', 'usia', 'is_korban'], 'integer'],
            [['alamat'], 'string'],
            [['nama', 'jenis_kelamin', 'nomor_hp', 'hubungan_dengan_korban'], 'string', 'max' => 255],
            [['nomor_hp'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_rahasia' => 'Is Rahasia',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'usia' => 'Usia',
            'jenis_kelamin' => 'Jenis Kelamin',
            'nomor_hp' => 'Nomor Hp',
            'is_korban' => 'Is Korban',
            'hubungan_dengan_korban' => 'Hubungan Dengan Korban',
        ];
    }

    /**
     * Gets query for [[Arsips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArsips()
    {
        return $this->hasMany(Arsip::className(), ['laporan_id' => 'id']);
    }

    /**
     * Gets query for [[Laporans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporans()
    {
        return $this->hasMany(Laporan::className(), ['pelapor_id' => 'id']);
    }
}
