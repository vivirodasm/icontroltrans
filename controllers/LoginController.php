<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Login;
use app\models\Tbusuarios;
use yii\helpers\ArrayHelper;
use app\models\Tbempresas;

class LoginController extends Controller
{
    /**
     * {@inheritdoc}
     */
     public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
		// session_destroy(); 	
		// session_start();
		
		$session = Yii::$app->session;
        // if (!Yii::$app->user->isGuest) {
            // return $this->goHome();
        // }

        $model = new Login(); 
        // if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // return $this->goBack();
        // }

        $usuario = $_POST['Login']['username'];
        $clave = $_POST['Login']['password'];
		
		
		$usuarios = Tbusuarios::find()->where(" IdUsuario ='" .$usuario."' 
						AND ClaveUsuario = '" .$clave."' 
						AND ActivoUsuario = -1" )->all();		
		$usuarios = ArrayHelper::getColumn( $usuarios, 'NombreUsuario' );
			
	
		if (empty($usuarios))
			{
				return $this->render('login', [
					 'model' => $model,
					 
					   
				]);
				
			}
			else{
				$_SESSION["usuario"]=$usuarios[0];
			
				return $this->render('../site/index', [
					// 'model' => $model,
				]);		
			}
		
			
		// echo"<pre>"; print_r($usuarios); echo"</pre>";
		
		// $model->password = '';
        // return $this->render('login', [
            // 'model' => $model,
        // ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        session_destroy();

        // return $this->goHome();
		// $model = new Tbempresas(); 
		// return $this->render('../site/index', [
					// // 'model' => $model,
				// ]);	
echo "<script> window.location=\"index.php?r=site%2Findex\";</script>";				
    }

    
}
