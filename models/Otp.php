<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "otp".
 *
 * @property int $id
 * @property string|null $nomor_hp
 * @property string|null $code
 * @property string|null $action
 * @property int|null $is_verified
 * @property string|null $expired_date
 */
class Otp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'otp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_verified'], 'integer'],
            [['expired_date'], 'safe'],
            [['nomor_hp', 'code', 'action'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomor_hp' => 'Nomor Hp',
            'code' => 'Code',
            'action' => 'Action',
            'is_verified' => 'Is Verified',
            'expired_date' => 'Expired Date',
        ];
    }
}
