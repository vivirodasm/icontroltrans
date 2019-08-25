<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Terceros;

/**
 * TercerosBuscar represents the model behind the search form of `app\models\Terceros`.
 */
class TercerosBuscar extends Terceros
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idtercero', 'dv_tercero', 'idIdentidad', 'idSociedad', 'naturalez_tercero', 'nombre1_tercero', 'nombre2_tercero', 'apellido1_tercero', 'apellido2_tercero', 'nombrecompleto', 'nombreComercial', 'direccion_tercero', 'tel_tercero', 'movil_tercero', 'idpaises', 'contacto_tercero', 'ced_Contacto', 'dir_contacto', 'tel_contacto', 'mail_tercero', 'tipo_tercero', 'obs_tercero', 'estado', 'rutaRut', 'rutaCedula', 'Aud_Fecha', 'Aud_FechaEdit'], 'safe'],
            [['IdEmpresa', 'idCenPob', 'autData', 'Aud_Usuario', 'Aud_UsuarioEdit'], 'integer'],
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
        $query = Terceros::find();

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
            'IdEmpresa' => $this->IdEmpresa,
            'idCenPob' => $this->idCenPob,
            'autData' => $this->autData,
            'Aud_Usuario' => $this->Aud_Usuario,
            'Aud_Fecha' => $this->Aud_Fecha,
            'Aud_UsuarioEdit' => $this->Aud_UsuarioEdit,
            'Aud_FechaEdit' => $this->Aud_FechaEdit,
        ]);

        $query->andFilterWhere(['like', 'idtercero', $this->idtercero])
            ->andFilterWhere(['like', 'dv_tercero', $this->dv_tercero])
            ->andFilterWhere(['like', 'idIdentidad', $this->idIdentidad])
            ->andFilterWhere(['like', 'idSociedad', $this->idSociedad])
            ->andFilterWhere(['like', 'naturalez_tercero', $this->naturalez_tercero])
            ->andFilterWhere(['like', 'nombre1_tercero', $this->nombre1_tercero])
            ->andFilterWhere(['like', 'nombre2_tercero', $this->nombre2_tercero])
            ->andFilterWhere(['like', 'apellido1_tercero', $this->apellido1_tercero])
            ->andFilterWhere(['like', 'apellido2_tercero', $this->apellido2_tercero])
            ->andFilterWhere(['like', 'nombrecompleto', $this->nombrecompleto])
            ->andFilterWhere(['like', 'nombreComercial', $this->nombreComercial])
            ->andFilterWhere(['like', 'direccion_tercero', $this->direccion_tercero])
            ->andFilterWhere(['like', 'tel_tercero', $this->tel_tercero])
            ->andFilterWhere(['like', 'movil_tercero', $this->movil_tercero])
            ->andFilterWhere(['like', 'idpaises', $this->idpaises])
            ->andFilterWhere(['like', 'contacto_tercero', $this->contacto_tercero])
            ->andFilterWhere(['like', 'ced_Contacto', $this->ced_Contacto])
            ->andFilterWhere(['like', 'dir_contacto', $this->dir_contacto])
            ->andFilterWhere(['like', 'tel_contacto', $this->tel_contacto])
            ->andFilterWhere(['like', 'mail_tercero', $this->mail_tercero])
            ->andFilterWhere(['like', 'tipo_tercero', $this->tipo_tercero])
            ->andFilterWhere(['like', 'obs_tercero', $this->obs_tercero])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'rutaRut', $this->rutaRut])
            ->andFilterWhere(['like', 'rutaCedula', $this->rutaCedula]);

        return $dataProvider;
    }
}
