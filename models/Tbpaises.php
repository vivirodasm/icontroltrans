<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbpaises".
 *
 * @property string $idpaises
 * @property string $nombrePais
 *
 * @property Terceros[] $terceros
 */
class Tbpaises extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbpaises';
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
            [['idpaises'], 'required'],
            [['idpaises'], 'string', 'max' => 5],
            [['nombrePais'], 'string', 'max' => 80],
            [['idpaises'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpaises' => 'Idpaises',
            'nombrePais' => 'Nombre Pais',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerceros()
    {
        return $this->hasMany(Terceros::className(), ['idpaises' => 'idpaises']);
    }
}
