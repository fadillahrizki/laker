<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laporan".
 *
 * @property int $id
 * @property int $pelapor_id
 * @property int $jenis_kasus_id
 * @property string|null $kronologi
 * @property string|null $status
 *
 * @property JenisKasus $jenisKasus
 * @property Korban[] $korbans
 * @property Pelapor $pelapor
 * @property Terlapor[] $terlapors
 */
class Laporan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laporan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pelapor_id', 'jenis_kasus_id','kronologi'], 'required','message'=>'{attribute} tidak boleh kosong!'],
            [['pelapor_id', 'jenis_kasus_id'], 'integer'],
            [['kronologi','penyelesaian'], 'string'],
            [['status'], 'string', 'max' => 255],
            [['jenis_kasus_id'], 'exist', 'skipOnError' => true, 'targetClass' => JenisKasus::className(), 'targetAttribute' => ['jenis_kasus_id' => 'id']],
            [['pelapor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pelapor::className(), 'targetAttribute' => ['pelapor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Laporan',
            'pelapor_id' => 'Pelapor ID',
            'jenis_kasus_id' => 'Jenis Kasus',
            'kronologi' => 'Kronologi',
            'penyelesaian' => 'Penyelesaian',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[JenisKasus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisKasus()
    {
        return $this->hasOne(JenisKasus::className(), ['id' => 'jenis_kasus_id']);
    }

    public function getKorban()
    {
        return $this->hasOne(Korban::className(), ['laporan_id'=>'id']);
    }

    /**
     * Gets query for [[Korbans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKorbans()
    {
        return $this->hasMany(Korban::className(), ['laporan_id' => 'id']);
    }

    /**
     * Gets query for [[Pelapor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelapor()
    {
        return $this->hasOne(Pelapor::className(), ['id' => 'pelapor_id']);
    }

    /**
     * Gets query for [[Terlapors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTerlapors()
    {
        return $this->hasMany(Terlapor::className(), ['laporan_id' => 'id']);
    }

    public function getTerlapor()
    {
        return $this->hasOne(Terlapor::className(), ['laporan_id'=>'id']);
    }

    public function getArsip()
    {
        return $this->hasOne(Arsip::className(), ['laporan_id'=>'id']);
    }
}
