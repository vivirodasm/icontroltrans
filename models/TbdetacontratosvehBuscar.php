<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tbdetacontratosveh;

/**
 * TbdetacontratosvehBuscar represents the model behind the search form of `app\models\Tbdetacontratosveh`.
 */
class TbdetacontratosvehBuscar extends Tbdetacontratosveh
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idContratoVeh', 'idContrato', 'anioContrato', 'vlrPropietario'], 'integer'],
            [['placa', 'horaIniMan', 'horaFinMan', 'horaIniTarde', 'horaFinTarde', 'notas'], 'safe'],
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
        $query = Tbdetacontratosveh::find();

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
            'idContratoVeh' => $this->idContratoVeh,
            'idContrato' => $this->idContrato,
            'anioContrato' => $this->anioContrato,
            'horaIniMan' => $this->horaIniMan,
            'horaFinMan' => $this->horaFinMan,
            'horaIniTarde' => $this->horaIniTarde,
            'horaFinTarde' => $this->horaFinTarde,
            'vlrPropietario' => $this->vlrPropietario,
        ]);

        $query->andFilterWhere(['like', 'placa', $this->placa])
            ->andFilterWhere(['like', 'notas', $this->notas]);

        return $dataProvider;
    }
}
