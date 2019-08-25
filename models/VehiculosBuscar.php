<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vehiculos;

/**
 * VehiculosBuscar represents the model behind the search form of `app\models\Vehiculos`.
 */
class VehiculosBuscar extends Vehiculos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['placa', 'NroInterno', 'fechaAfil', 'fechaDesafil', 'estado', 'emprAfil', 'fechaVtoConvenio', 'relacion', 'nroContrAfil', 'fechaVtoContAfil', 'clase', 'claseTarifaFUEC', 'marca', 'combustible', 'tipoTransporte', 'rutaVeh', 'propietario', 'observaciones', 'nroMatricula', 'orgTransito', 'fechaExpMatric', 'linea', 'cilindraje', 'color', 'motor', 'chasis', 'nroTarjOper', 'fechaExpTO', 'fechaVtoTO', 'nombreCDA', 'nroCertCDA', 'fechaVtoExtintor', 'fechaExpCDA', 'fechaVtoCDA', 'aseguradoraSOAT', 'nroSOAT', 'fechaExpSOAT', 'fechaVtoSOAT', 'aseguradoraRCC', 'nroRCC', 'fechaExpRCC', 'fechaVtoRCC', 'aseguradoraRCE', 'nroRCE', 'fechaExpRCE', 'fechaVtoRCE', 'rutaImgVeh', 'rutaMatricula1', 'rutaMatricula2', 'rutaTOperacion1', 'rutaTOperacion2', 'rutaCDA', 'rutaSoat', 'rutaRCC', 'rutaRCE', 'Aud_Fecha', 'Aud_FechaEdit'], 'safe'],
            [['modelo', 'vehEmpresa', 'vehBloqueado', 'capacPjs', 'carct_TV', 'carct_sonido', 'carct_banio', 'carct_sillaReclin', 'carct_aireAcond', 'carct_microf', 'carct_GPS', 'carct_Calefac', 'carct_portaEquip', 'carct_cinturSeg', 'carct_salidEmerg', 'carct_martillFrag', 'carct_luzIntNeon', 'carct_luzIndSilla', 'carct_cortinas', 'Aud_Usuario', 'Aud_UsuarioEdit'], 'integer'],
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
        $query = Vehiculos::find();

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
            'fechaAfil' => $this->fechaAfil,
            'fechaDesafil' => $this->fechaDesafil,
            'fechaVtoConvenio' => $this->fechaVtoConvenio,
            'fechaVtoContAfil' => $this->fechaVtoContAfil,
            'modelo' => $this->modelo,
            'vehEmpresa' => $this->vehEmpresa,
            'vehBloqueado' => $this->vehBloqueado,
            'fechaExpMatric' => $this->fechaExpMatric,
            'capacPjs' => $this->capacPjs,
            'fechaExpTO' => $this->fechaExpTO,
            'fechaVtoTO' => $this->fechaVtoTO,
            'fechaVtoExtintor' => $this->fechaVtoExtintor,
            'fechaExpCDA' => $this->fechaExpCDA,
            'fechaVtoCDA' => $this->fechaVtoCDA,
            'fechaExpSOAT' => $this->fechaExpSOAT,
            'fechaVtoSOAT' => $this->fechaVtoSOAT,
            'fechaExpRCC' => $this->fechaExpRCC,
            'fechaVtoRCC' => $this->fechaVtoRCC,
            'fechaExpRCE' => $this->fechaExpRCE,
            'fechaVtoRCE' => $this->fechaVtoRCE,
            'carct_TV' => $this->carct_TV,
            'carct_sonido' => $this->carct_sonido,
            'carct_banio' => $this->carct_banio,
            'carct_sillaReclin' => $this->carct_sillaReclin,
            'carct_aireAcond' => $this->carct_aireAcond,
            'carct_microf' => $this->carct_microf,
            'carct_GPS' => $this->carct_GPS,
            'carct_Calefac' => $this->carct_Calefac,
            'carct_portaEquip' => $this->carct_portaEquip,
            'carct_cinturSeg' => $this->carct_cinturSeg,
            'carct_salidEmerg' => $this->carct_salidEmerg,
            'carct_martillFrag' => $this->carct_martillFrag,
            'carct_luzIntNeon' => $this->carct_luzIntNeon,
            'carct_luzIndSilla' => $this->carct_luzIndSilla,
            'carct_cortinas' => $this->carct_cortinas,
            'Aud_Usuario' => $this->Aud_Usuario,
            'Aud_Fecha' => $this->Aud_Fecha,
            'Aud_UsuarioEdit' => $this->Aud_UsuarioEdit,
            'Aud_FechaEdit' => $this->Aud_FechaEdit,
        ]);

        $query->andFilterWhere(['like', 'placa', $this->placa])
            ->andFilterWhere(['like', 'NroInterno', $this->NroInterno])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'emprAfil', $this->emprAfil])
            ->andFilterWhere(['like', 'relacion', $this->relacion])
            ->andFilterWhere(['like', 'nroContrAfil', $this->nroContrAfil])
            ->andFilterWhere(['like', 'clase', $this->clase])
            ->andFilterWhere(['like', 'claseTarifaFUEC', $this->claseTarifaFUEC])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'combustible', $this->combustible])
            ->andFilterWhere(['like', 'tipoTransporte', $this->tipoTransporte])
            ->andFilterWhere(['like', 'rutaVeh', $this->rutaVeh])
            ->andFilterWhere(['like', 'propietario', $this->propietario])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'nroMatricula', $this->nroMatricula])
            ->andFilterWhere(['like', 'orgTransito', $this->orgTransito])
            ->andFilterWhere(['like', 'linea', $this->linea])
            ->andFilterWhere(['like', 'cilindraje', $this->cilindraje])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'motor', $this->motor])
            ->andFilterWhere(['like', 'chasis', $this->chasis])
            ->andFilterWhere(['like', 'nroTarjOper', $this->nroTarjOper])
            ->andFilterWhere(['like', 'nombreCDA', $this->nombreCDA])
            ->andFilterWhere(['like', 'nroCertCDA', $this->nroCertCDA])
            ->andFilterWhere(['like', 'aseguradoraSOAT', $this->aseguradoraSOAT])
            ->andFilterWhere(['like', 'nroSOAT', $this->nroSOAT])
            ->andFilterWhere(['like', 'aseguradoraRCC', $this->aseguradoraRCC])
            ->andFilterWhere(['like', 'nroRCC', $this->nroRCC])
            ->andFilterWhere(['like', 'aseguradoraRCE', $this->aseguradoraRCE])
            ->andFilterWhere(['like', 'nroRCE', $this->nroRCE])
            ->andFilterWhere(['like', 'rutaImgVeh', $this->rutaImgVeh])
            ->andFilterWhere(['like', 'rutaMatricula1', $this->rutaMatricula1])
            ->andFilterWhere(['like', 'rutaMatricula2', $this->rutaMatricula2])
            ->andFilterWhere(['like', 'rutaTOperacion1', $this->rutaTOperacion1])
            ->andFilterWhere(['like', 'rutaTOperacion2', $this->rutaTOperacion2])
            ->andFilterWhere(['like', 'rutaCDA', $this->rutaCDA])
            ->andFilterWhere(['like', 'rutaSoat', $this->rutaSoat])
            ->andFilterWhere(['like', 'rutaRCC', $this->rutaRCC])
            ->andFilterWhere(['like', 'rutaRCE', $this->rutaRCE]);

        return $dataProvider;
    }
}
