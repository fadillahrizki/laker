<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pelapor;

/**
 * PelaporSearch represents the model behind the search form of `app\models\Pelapor`.
 */
class PelaporSearch extends Pelapor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_rahasia', 'usia', 'is_korban'], 'integer'],
            [['nama', 'alamat', 'jenis_kelamin', 'nomor_hp', 'hubungan_dengan_korban'], 'safe'],
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
        $query = Pelapor::find();

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
            'is_rahasia' => $this->is_rahasia,
            'usia' => $this->usia,
            'is_korban' => $this->is_korban,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'nomor_hp', $this->nomor_hp])
            ->andFilterWhere(['like', 'hubungan_dengan_korban', $this->hubungan_dengan_korban]);

        return $dataProvider;
    }
}
