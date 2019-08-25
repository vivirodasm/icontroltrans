<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbdetacontratosveh".
 *
 * @property int $idContratoVeh
 * @property int $idContrato
 * @property int $anioContrato
 * @property string $placa
 * @property string $horaIniMan
 * @property string $horaFinMan
 * @property string $horaIniTarde
 * @property string $horaFinTarde
 * @property int $vlrPropietario
 * @property string $notas
 *
 * @property Tbcontratos $contrato
 * @property Vehiculos $placa0
 */
class Tbdetacontratosveh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbdetacontratosveh';
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
            [['idContrato', 'anioContrato', 'placa'], 'required'],
            [['idContrato', 'anioContrato', 'vlrPropietario'], 'integer'],
            [['horaIniMan', 'horaFinMan', 'horaIniTarde', 'horaFinTarde'], 'safe'],
            [['placa'], 'string', 'max' => 50],
            [['notas'], 'string', 'max' => 255],
            [['idContrato', 'anioContrato'], 'exist', 'skipOnError' => true, 'targetClass' => Tbcontratos::className(), 'targetAttribute' => ['idContrato' => 'idContrato', 'anioContrato' => 'anioContrato']],
            [['placa'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculos::className(), 'targetAttribute' => ['placa' => 'placa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idContratoVeh' => 'Id Contrato Veh',
            'idContrato' => 'Id Contrato',
            'anioContrato' => 'Año Contrato',
            'placa' => 'Placa',
            'horaIniMan' => 'Hora Ini Man',
            'horaFinMan' => 'Hora Fin Man',
            'horaIniTarde' => 'Hora Ini Tarde',
            'horaFinTarde' => 'Hora Fin Tarde',
            'vlrPropietario' => 'Vlr Propietario',
            'notas' => 'Notas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContrato()
    {
        return $this->hasOne(Tbcontratos::className(), ['idContrato' => 'idContrato', 'anioContrato' => 'anioContrato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaca0()
    {
        return $this->hasOne(Vehiculos::className(), ['placa' => 'placa']);
    }
}
