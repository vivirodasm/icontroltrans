<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbcontratos".
 *
 * @property int $consContrato Consecutivo incremental del FUEC
 * @property string $nroContrato
 * @property int $idContrato
 * @property int $anioContrato
 * @property string $idtercero
 * @property int $sucursalActiva
 * @property string $sucursalTercero
 * @property string $tipoContrato
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property string $ciudadOrigen
 * @property string $ciudadDestino
 * @property string $objetCont
 * @property int $cantVeh
 * @property int $nroPsj
 * @property double $vlrContrato
 * @property string $estado
 * @property string $aliasContrato
 * @property string $notasContrato
 * @property string $resp_Contrato
 * @property string $cedResp_Contrato
 * @property string $dirResp_Contrato
 * @property string $telResp_Contrato
 * @property int $Aud_Usuario
 * @property string $Aud_Fecha
 * @property int $Aud_UsuarioEdit
 * @property string $Aud_FechaEdit
 *
 * @property Tbusuarios $audUsuario
 * @property Tbtipocontrato $tipoContrato0
 * @property Terceros $tercero
 * @property Tbdetacontratosveh[] $tbdetacontratosvehs
 * @property Tbdetagrupoempcontratantes[] $tbdetagrupoempcontratantes
 * @property Tbdetanovedcont[] $tbdetanovedconts
 * @property Tbdetarutacontrato[] $tbdetarutacontratos
 * @property Tbextractos[] $tbextractos
 */
class Tbcontratos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbcontratos';
    }
	
	/**
     * {@inheritdoc}
	 * Conexion a la base de datos correspondiente
     */
	public static function getDb() 
	{
		return Yii::$app->get($_SESSION['db']);
		
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'idtercero', 'fechaInicio', 'fechaFin', 'ciudadOrigen', 'ciudadDestino', 'objetCont', 'nroPsj', 'Aud_Usuario', 'Aud_Fecha','vlrContrato','cantVeh','tipoContrato'], 'required'],
            [['idContrato', 'anioContrato', 'sucursalActiva', 'nroPsj', 'Aud_Usuario', 'Aud_UsuarioEdit'], 'integer'],
            [['fechaInicio', 'fechaFin', 'Aud_Fecha', 'Aud_FechaEdit'], 'safe'],
            [['objetCont'], 'string'],
            [['vlrContrato'], 'integer','min'=>1],
            [['cantVeh'], 'number','min'=>1],
            [['nroContrato'], 'string', 'max' => 9],
            [['idtercero'], 'string', 'max' => 15],
            [['sucursalTercero', 'ciudadOrigen', 'ciudadDestino', 'resp_Contrato'], 'string', 'max' => 80],
            [['tipoContrato'], 'string', 'max' => 45],
            [['estado', 'aliasContrato', 'cedResp_Contrato'], 'string', 'max' => 20],
            [['notasContrato', 'dirResp_Contrato'], 'string', 'max' => 255],
            [['telResp_Contrato'], 'string', 'max' => 50],
            [['nroContrato'], 'unique'],
            [['idContrato', 'anioContrato'], 'unique', 'targetAttribute' => ['idContrato', 'anioContrato']],
            [['Aud_Usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Tbusuarios::className(), 'targetAttribute' => ['Aud_Usuario' => 'IdUsuario']],
            [['tipoContrato'], 'exist', 'skipOnError' => true, 'targetClass' => Tbtipocontrato::className(), 'targetAttribute' => ['tipoContrato' => 'tipoContrato']],
            [['idtercero'], 'exist', 'skipOnError' => true, 'targetClass' => Terceros::className(), 'targetAttribute' => ['idtercero' => 'idtercero']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'consContrato' => 'Cons Contrato',
            'nroContrato' => 'Nro Contrato',
            'idContrato' => 'Id Contrato',
            'anioContrato' => 'Anio Contrato',
            'idtercero' => 'Tercero',
            'sucursalActiva' => 'Activar sucursal',
            'sucursalTercero' => 'Sucursal',
            'tipoContrato' => 'Tipo Contrato',
            'fechaInicio' => 'Inicio',
            'fechaFin' => 'Fin',
            'ciudadOrigen' => 'Ciudad Origen',
            'ciudadDestino' => 'Ciudad Destino',
            'objetCont' => 'Objeto del Contrato (Transcribir exactamente igual al contrato original)',
            'cantVeh' => 'Cant Veh',
            'nroPsj' => 'Nro Pasajeros',
            'vlrContrato' => 'Vlr Contrato',
            'estado' => 'Estado',
            'aliasContrato' => 'Alias Contrato',
            'notasContrato' => 'Notas Contrato',
            'resp_Contrato' => 'Responsable',
            'cedResp_Contrato' => 'Cedula',
            'dirResp_Contrato' => 'Dirección',
            'telResp_Contrato' => 'Telefono ',
            'Aud_Usuario' => 'Aud Usuario',
            'Aud_Fecha' => 'Aud Fecha',
            'Aud_UsuarioEdit' => 'Aud Usuario Edit',
            'Aud_FechaEdit' => 'Aud Fecha Edit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAudUsuario()
    {
        return $this->hasOne(Tbusuarios::className(), ['IdUsuario' => 'Aud_Usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoContrato0()
    {
        return $this->hasOne(Tbtipocontrato::className(), ['tipoContrato' => 'tipoContrato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTercero()
    {
        return $this->hasOne(Terceros::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdetacontratosvehs()
    {
        return $this->hasMany(Tbdetacontratosveh::className(), ['idContrato' => 'idContrato', 'anioContrato' => 'anioContrato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdetagrupoempcontratantes()
    {
        return $this->hasMany(Tbdetagrupoempcontratantes::className(), ['idContrato' => 'idContrato', 'anioContrato' => 'anioContrato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdetanovedconts()
    {
        return $this->hasMany(Tbdetanovedcont::className(), ['IdContrato' => 'idContrato', 'anioContrato' => 'anioContrato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdetarutacontratos()
    {
        return $this->hasMany(Tbdetarutacontrato::className(), ['idContrato' => 'idContrato', 'anioContrato' => 'anioContrato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbextractos()
    {
        return $this->hasMany(Tbextractos::className(), ['nroContrato' => 'idContrato', 'anioContrato' => 'anioContrato']);
    }
	
	
	
}
