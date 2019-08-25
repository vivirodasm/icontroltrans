<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tbtipocontrato".
 *
 * @property string $tipoContrato
 * @property string $descripTipoContrato
 */
class Tbtipocontrato extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Tbtipocontrato';
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
            [['tipoContrato', 'descripTipoContrato'], 'required'],
            [['tipoContrato'], 'string', 'max' => 80],
            [['descripTipoContrato'], 'string', 'max' => 120],
            [['tipoContrato'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tipoContrato' => 'Tipo Contrato',
            'descripTipoContrato' => 'Descrip Tipo Contrato',
        ];
    }
}
