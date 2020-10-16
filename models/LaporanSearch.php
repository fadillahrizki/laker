<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Laporan;

/**
 * LaporanSearch represents the model behind the search form of `app\models\Laporan`.
 */
class LaporanSearch extends Laporan
{

    public $pelapor,$jenisKasus;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pelapor_id', 'jenis_kasus_id'], 'integer'],
            [['kronologi', 'status','pelapor','jenisKasus'], 'safe'],
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
        $query = Laporan::find();

        // add conditions that should always apply here


        $query->joinWith(["pelapor","jenisKasus"]);

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
            'pelapor_id' => $this->pelapor_id,
            'jenis_kasus_id' => $this->jenis_kasus_id,
        ]);

        $query->andFilterWhere(['like', 'kronologi', $this->kronologi])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like','pelapor.nama',$this->pelapor])
            ->andFilterWhere(['like','jenisKasus.nama',$this->jenisKasus]);

        return $dataProvider;
    }
}
