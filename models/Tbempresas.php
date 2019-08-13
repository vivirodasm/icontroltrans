<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbempresas".
 *
 * @property int $nit
 * @property string $nombre
 * @property string $dsn
 * @property string $usuario
 * @property string $password
 * @property string $charset
 * @property int $estado
 */
class Tbempresas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbempresas';
    }
	
	public static function getDb()
	{
		return Yii::$app->db1;
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nit'], 'required'],
            [['nit'], 'integer'],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nit' => 'Nit',
            'nombre' => 'Nombre',
            'dsn' => 'Dsn',
            'usuario' => 'Usuario',
            'password' => 'Password',
            'charset' => 'Charset',
            'estado' => 'Estado',
        ];
    }
	
	
}
