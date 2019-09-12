<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tbextractos;

/**
 * TbextractosBuscar represents the model behind the search form of `app\models\Tbextractos`.
 */
class TbextractosBuscar extends Tbextractos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['consFUEC', 'anioExtracto', 'idExtracto', 'nroContrato', 'anioContrato', 'ciudadOrigen', 'ciudadDestino', 'destinosVarios', 'idDestino', 'idRuta', 'rboFUEC', 'validoPDF', 'membreteEmp', 'anuladoFUEC', 'facturado', 'GrupoFUEC', 'Aud_Usuario', 'Aud_UsuarioEdit'], 'integer'],
            [['FUEC', 'antFUEC', 'idtercero', 'fechaExtracto', 'resp_Contrato', 'cedResp_Contrato', 'dirResp_Contrato', 'telResp_Contrato', 'convenioEmp', 'fechaVtoConvenio', 'fechaInicio', 'fechaFin', 'descripDestino', 'descripRuta', 'idvehiculo', 'vehVtoTO', 'vehVtoExtintor', 'vehVtoCDA', 'vehVtoSOAT', 'vehVtoRCC', 'vehVtoRCE', 'vehVtoBimestral', 'tipoContrato', 'notaExtracto', 'Aud_Fecha', 'Aud_FechaEdit'], 'safe'],
            [['vlrServicio', 'vlrFUEC', 'vlrCONTBFUEC', 'vlrRecibido'], 'number'],
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
        $query = Tbextractos::find();

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
            'consFUEC' => $this->consFUEC,
            'anioExtracto' => $this->anioExtracto,
            'idExtracto' => $this->idExtracto,
            'fechaExtracto' => $this->fechaExtracto,
            'fechaVtoConvenio' => $this->fechaVtoConvenio,
            'nroContrato' => $this->nroContrato,
            'anioContrato' => $this->anioContrato,
            'fechaInicio' => $this->fechaInicio,
            'fechaFin' => $this->fechaFin,
            'ciudadOrigen' => $this->ciudadOrigen,
            'ciudadDestino' => $this->ciudadDestino,
            'destinosVarios' => $this->destinosVarios,
            'idDestino' => $this->idDestino,
            'idRuta' => $this->idRuta,
            'vehVtoTO' => $this->vehVtoTO,
            'vehVtoExtintor' => $this->vehVtoExtintor,
            'vehVtoCDA' => $this->vehVtoCDA,
            'vehVtoSOAT' => $this->vehVtoSOAT,
            'vehVtoRCC' => $this->vehVtoRCC,
            'vehVtoRCE' => $this->vehVtoRCE,
            'vehVtoBimestral' => $this->vehVtoBimestral,
            'vlrServicio' => $this->vlrServicio,
            'vlrFUEC' => $this->vlrFUEC,
            'vlrCONTBFUEC' => $this->vlrCONTBFUEC,
            'vlrRecibido' => $this->vlrRecibido,
            'rboFUEC' => $this->rboFUEC,
            'validoPDF' => $this->validoPDF,
            'membreteEmp' => $this->membreteEmp,
            'anuladoFUEC' => $this->anuladoFUEC,
            'facturado' => $this->facturado,
            'GrupoFUEC' => $this->GrupoFUEC,
            'Aud_Usuario' => $this->Aud_Usuario,
            'Aud_Fecha' => $this->Aud_Fecha,
            'Aud_UsuarioEdit' => $this->Aud_UsuarioEdit,
            'Aud_FechaEdit' => $this->Aud_FechaEdit,
        ]);

        $query->andFilterWhere(['like', 'FUEC', $this->FUEC])
            ->andFilterWhere(['like', 'antFUEC', $this->antFUEC])
            ->andFilterWhere(['like', 'idtercero', $this->idtercero])
            ->andFilterWhere(['like', 'resp_Contrato', $this->resp_Contrato])
            ->andFilterWhere(['like', 'cedResp_Contrato', $this->cedResp_Contrato])
            ->andFilterWhere(['like', 'dirResp_Contrato', $this->dirResp_Contrato])
            ->andFilterWhere(['like', 'telResp_Contrato', $this->telResp_Contrato])
            ->andFilterWhere(['like', 'convenioEmp', $this->convenioEmp])
            ->andFilterWhere(['like', 'descripDestino', $this->descripDestino])
            ->andFilterWhere(['like', 'descripRuta', $this->descripRuta])
            ->andFilterWhere(['like', 'idvehiculo', $this->idvehiculo])
            ->andFilterWhere(['like', 'tipoContrato', $this->tipoContrato])
            ->andFilterWhere(['like', 'notaExtracto', $this->notaExtracto]);

        return $dataProvider;
    }
}
