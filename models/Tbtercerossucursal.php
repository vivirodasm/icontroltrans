<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbtercerossucursal".
 *
 * @property int $idterceroSucursal
 * @property string $idtercero
 * @property string $nombreSucursalTer
 * @property string $direccionSucursalTer
 * @property string $telSucursalTer
 * @property string $movilSucursalTer
 * @property string $contactoSucursalTer
 * @property int $ciudadSucursalTer
 *
 * @property Terceros $tercero
 * @property Tbpoblaciones $ciudadSucursalTer0
 */
class Tbtercerossucursal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbtercerossucursal';
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
            [['idtercero', 'nombreSucursalTer', 'direccionSucursalTer', 'ciudadSucursalTer'], 'required'],
            [['ciudadSucursalTer'], 'integer'],
            [['idtercero'], 'string', 'max' => 15],
            [['nombreSucursalTer', 'contactoSucursalTer'], 'string', 'max' => 80],
            [['direccionSucursalTer'], 'string', 'max' => 150],
            [['telSucursalTer', 'movilSucursalTer'], 'string', 'max' => 50],
            [['idtercero'], 'exist', 'skipOnError' => true, 'targetClass' => Terceros::className(), 'targetAttribute' => ['idtercero' => 'idtercero']],
            [['ciudadSucursalTer'], 'exist', 'skipOnError' => true, 'targetClass' => Tbpoblaciones::className(), 'targetAttribute' => ['ciudadSucursalTer' => 'idCenPob']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idterceroSucursal' => 'Idtercero Sucursal',
            'idtercero' => 'Tercero',
            'nombreSucursalTer' => 'Nombre',
            'direccionSucursalTer' => 'Dirección ',
            'telSucursalTer' => 'Teléfono',
            'movilSucursalTer' => 'Móvil',
            'contactoSucursalTer' => 'Contacto',
            'ciudadSucursalTer' => 'Ciudad',
        ];
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
    public function getCiudadSucursalTer0()
    {
        return $this->hasOne(Tbpoblaciones::className(), ['idCenPob' => 'ciudadSucursalTer']);
    }
}
