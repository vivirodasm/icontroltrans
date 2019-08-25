<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbsociedades".
 *
 * @property string $idSociedad
 * @property string $nombreSociedad
 * @property int $jerarquiaSociedad
 * @property string $autoretenedor
 * @property string $impCompra
 * @property string $impVenta
 *
 * @property Terceros[] $terceros
 */
class Tbsociedades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbsociedades';
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
            [['idSociedad'], 'required'],
            [['jerarquiaSociedad'], 'integer'],
            [['idSociedad'], 'string', 'max' => 15],
            [['nombreSociedad'], 'string', 'max' => 80],
            [['autoretenedor', 'impCompra', 'impVenta'], 'string', 'max' => 5],
            [['idSociedad'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSociedad' => 'Id Sociedad',
            'nombreSociedad' => 'Nombre Sociedad',
            'jerarquiaSociedad' => 'Jerarquia Sociedad',
            'autoretenedor' => 'Autoretenedor',
            'impCompra' => 'Imp Compra',
            'impVenta' => 'Imp Venta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerceros()
    {
        return $this->hasMany(Terceros::className(), ['idSociedad' => 'idSociedad']);
    }
}
