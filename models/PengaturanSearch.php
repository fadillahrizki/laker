<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengaturan;

/**
 * PengaturanSearch represents the model behind the search form of `app\models\Pengaturan`.
 */
class PengaturanSearch extends Pengaturan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['sms_user', 'sms_password', 'sms_no_admin', 'konten_admin', 'konten_user_masuk', 'konten_user_tindak_lanjut', 'konten_selesai', 'konten_kembali'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pengaturan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'sms_user', $this->sms_user])
            ->andFilterWhere(['like', 'sms_password', $this->sms_password])
            ->andFilterWhere(['like', 'sms_no_admin', $this->sms_no_admin])
            ->andFilterWhere(['like', 'konten_admin', $this->konten_admin])
            ->andFilterWhere(['like', 'konten_user_masuk', $this->konten_user_masuk])
            ->andFilterWhere(['like', 'konten_user_tindak_lanjut', $this->konten_user_tindak_lanjut])
            ->andFilterWhere(['like', 'konten_selesai', $this->konten_selesai])
            ->andFilterWhere(['like', 'konten_kembali', $this->konten_kembali]);

        return $dataProvider;
    }
}
