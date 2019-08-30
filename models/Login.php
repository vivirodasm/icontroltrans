<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Login extends Model
{
    public $username;
    public $password;
    


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
          
        ];
    }
	
	/**
     * {@inheritdoc}
	 * Conexion a la base de datos correspondiente
     */
	public static function getDb() 
	{
		
			return Yii::$app->get($_SESSION['db']);
		
	}

    
}
