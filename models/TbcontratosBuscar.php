<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tbcontratos;

/**
 * TbcontratosBuscar represents the model behind the search form of `app\models\Tbcontratos`.
 */
class TbcontratosBuscar extends Tbcontratos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['consContrato', 'idContrato', 'anioContrato', 'sucursalActiva', 'cantVeh', 'nroPsj', 'Aud_Usuario', 'Aud_UsuarioEdit'], 'integer'],
            [['nroContrato', 'idtercero', 'sucursalTercero', 'tipoContrato', 'fechaInicio', 'fechaFin', 'ciudadOrigen', 'ciudadDestino', 'objetCont', 'estado', 'aliasContrato', 'notasContrato', 'resp_Contrato', 'cedResp_Contrato', 'dirResp_Contrato', 'telResp_Contrato', 'Aud_Fecha', 'Aud_FechaEdit'], 'safe'],
            [['vlrContrato'], 'number'],
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
        $query = Tbcontratos::find();

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
            'consContrato' => $this->consContrato,
            'idContrato' => $this->idContrato,
            'anioContrato' => $this->anioContrato,
            'sucursalActiva' => $this->sucursalActiva,
            'fechaInicio' => $this->fechaInicio,
            'fechaFin' => $this->fechaFin,
            'cantVeh' => $this->cantVeh,
            'nroPsj' => $this->nroPsj,
            'vlrContrato' => $this->vlrContrato,
            'Aud_Usuario' => $this->Aud_Usuario,
            'Aud_Fecha' => $this->Aud_Fecha,
            'Aud_UsuarioEdit' => $this->Aud_UsuarioEdit,
            'Aud_FechaEdit' => $this->Aud_FechaEdit,
        ]);

        $query->andFilterWhere(['like', 'nroContrato', $this->nroContrato])
            ->andFilterWhere(['like', 'idtercero', $this->idtercero])
            ->andFilterWhere(['like', 'sucursalTercero', $this->sucursalTercero])
            ->andFilterWhere(['like', 'tipoContrato', $this->tipoContrato])
            ->andFilterWhere(['like', 'ciudadOrigen', $this->ciudadOrigen])
            ->andFilterWhere(['like', 'ciudadDestino', $this->ciudadDestino])
            ->andFilterWhere(['like', 'objetCont', $this->objetCont])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'aliasContrato', $this->aliasContrato])
            ->andFilterWhere(['like', 'notasContrato', $this->notasContrato])
            ->andFilterWhere(['like', 'resp_Contrato', $this->resp_Contrato])
            ->andFilterWhere(['like', 'cedResp_Contrato', $this->cedResp_Contrato])
            ->andFilterWhere(['like', 'dirResp_Contrato', $this->dirResp_Contrato])
            ->andFilterWhere(['like', 'telResp_Contrato', $this->telResp_Contrato]);

        return $dataProvider;
    }
}
