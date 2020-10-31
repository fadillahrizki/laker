<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "terlapor".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $alamat
 * @property int|null $usia
 * @property string|null $jenis_kelamin
 * @property string|null $nomor_hp
 * @property int $laporan_id
 *
 * @property Laporan $laporan
 */
class Terlapor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'terlapor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alamat','laporan_id','hubungan_dengan_korban'], 'string'],
            [['usia',], 'integer'],
            [['laporan_id','alamat','nama','jenis_kelamin', 'hubungan_dengan_korban'], 'required','message'=>'{attribute} tidak boleh kosong!'],
            [['nama', 'jenis_kelamin', 'nomor_hp'], 'string', 'max' => 255],
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
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'usia' => 'Usia',
            'jenis_kelamin' => 'Jenis Kelamin',
            'nomor_hp' => 'Nomor Hp',
            'laporan_id' => 'Laporan ID',
            'hubungan_dengan_korban' => 'Hubungan Dengan Korban',
        ];
    }

    /**
     * Gets query for [[Laporan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporan()
    {
        return $this->hasOne(Laporan::className(), ['id' => 'laporan_id']);
    }
}
