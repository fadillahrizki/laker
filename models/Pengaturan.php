<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengaturan".
 *
 * @property int $id
 * @property string|null $sms_user
 * @property string|null $sms_password
 * @property string|null $sms_no_admin
 * @property string|null $konten_admin
 * @property string|null $konten_user_masuk
 * @property string|null $konten_user_tindak_lanjut
 * @property string|null $konten_selesai
 * @property string|null $konten_kembali
 */
class Pengaturan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengaturan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['konten_user_masuk', 'konten_user_tindak_lanjut', 'konten_selesai', 'konten_kembali','konten_arsip'], 'string'],
            [['sms_user', 'sms_password', 'sms_no_admin', 'konten_admin', 'alarm_file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sms_user' => 'Sms User',
            'sms_password' => 'Sms Password',
            'sms_no_admin' => 'Sms No Admin',
            'konten_admin' => 'Konten Admin',
            'konten_user_masuk' => 'Konten User Masuk',
            'konten_user_tindak_lanjut' => 'Konten User Tindak Lanjut',
            'konten_selesai' => 'Konten Selesai',
            'konten_arsip' => 'Konten Arsip',
            'konten_kembali' => 'Konten Kembali',
            'alarm_file' => 'Alarm File',
        ];
    }
}
