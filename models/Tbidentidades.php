<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbidentidades".
 *
 * @property string $idIdentidad
 * @property string $codIdentidad
 * @property string $nombreIdentidad
 *
 * @property Terceros[] $terceros
 */
class Tbidentidades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbidentidades';
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
            [['idIdentidad'], 'required'],
            [['idIdentidad', 'codIdentidad'], 'string', 'max' => 5],
            [['nombreIdentidad'], 'string', 'max' => 80],
            [['idIdentidad'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idIdentidad' => 'Id Identidad',
            'codIdentidad' => 'Cod Identidad',
            'nombreIdentidad' => 'Nombre Identidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerceros()
    {
        return $this->hasMany(Terceros::className(), ['idIdentidad' => 'idIdentidad']);
    }
}
