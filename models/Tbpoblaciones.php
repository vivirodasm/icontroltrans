<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbpoblaciones".
 *
 * @property int $idCenPob
 * @property string $CentroPoblado
 * @property string $Municipio
 * @property string $Departamento
 * @property string $DANE
 * @property string $tarifaAutomovil
 * @property string $tarifaCampero
 * @property string $tarifaCamioneta
 * @property string $tarifaAerovan
 * @property string $tarifaMicrobus
 * @property string $tarifaBuseta
 * @property string $tarifaBuseton
 * @property string $tarifaBus
 *
 * @property Tbempresa[] $tbempresas
 * @property Tbtercerossucursal[] $tbtercerossucursals
 * @property Terceros[] $terceros
 */
class Tbpoblaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbpoblaciones';
    }
	
	public static function getDb() 
	{
		return Yii::$app->get('db1');
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CentroPoblado', 'Municipio', 'Departamento', 'DANE'], 'required'],
            [['tarifaAutomovil', 'tarifaCampero', 'tarifaCamioneta', 'tarifaAerovan', 'tarifaMicrobus', 'tarifaBuseta', 'tarifaBuseton', 'tarifaBus'], 'number'],
            [['CentroPoblado', 'Municipio', 'Departamento', 'DANE'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCenPob' => 'Id Cen Pob',
            'CentroPoblado' => 'Centro Poblado',
            'Municipio' => 'Municipio',
            'Departamento' => 'Departamento',
            'DANE' => 'Dane',
            'tarifaAutomovil' => 'Tarifa Automovil',
            'tarifaCampero' => 'Tarifa Campero',
            'tarifaCamioneta' => 'Tarifa Camioneta',
            'tarifaAerovan' => 'Tarifa Aerovan',
            'tarifaMicrobus' => 'Tarifa Microbus',
            'tarifaBuseta' => 'Tarifa Buseta',
            'tarifaBuseton' => 'Tarifa Buseton',
            'tarifaBus' => 'Tarifa Bus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbempresas()
    {
        return $this->hasMany(Tbempresa::className(), ['Ciudad' => 'idCenPob']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbtercerossucursals()
    {
        return $this->hasMany(Tbtercerossucursal::className(), ['ciudadSucursalTer' => 'idCenPob']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerceros()
    {
        return $this->hasMany(Terceros::className(), ['idCenPob' => 'idCenPob']);
    }
}
