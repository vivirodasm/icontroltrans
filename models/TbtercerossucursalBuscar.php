<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tbtercerossucursal;

/**
 * TbtercerossucursalBuscar represents the model behind the search form of `app\models\Tbtercerossucursal`.
 */
class TbtercerossucursalBuscar extends Tbtercerossucursal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idterceroSucursal', 'ciudadSucursalTer'], 'integer'],
            [['idtercero', 'nombreSucursalTer', 'direccionSucursalTer', 'telSucursalTer', 'movilSucursalTer', 'contactoSucursalTer'], 'safe'],
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
        $query = Tbtercerossucursal::find();

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
            'idterceroSucursal' => $this->idterceroSucursal,
            'ciudadSucursalTer' => $this->ciudadSucursalTer,
        ]);

        $query->andFilterWhere(['like', 'idtercero', $this->idtercero])
            ->andFilterWhere(['like', 'nombreSucursalTer', $this->nombreSucursalTer])
            ->andFilterWhere(['like', 'direccionSucursalTer', $this->direccionSucursalTer])
            ->andFilterWhere(['like', 'telSucursalTer', $this->telSucursalTer])
            ->andFilterWhere(['like', 'movilSucursalTer', $this->movilSucursalTer])
            ->andFilterWhere(['like', 'contactoSucursalTer', $this->contactoSucursalTer]);

        return $dataProvider;
    }
}
