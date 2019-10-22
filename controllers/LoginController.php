<?php

namespace app\controllers;



// sesion

if(@isset($_SESSION['db']))
{ 
	// echo $_SESSION['nombre'];
} 
//si no tiene sesion se redirecciona al login
else
{
	echo "<script> window.location=\"index.php?r=tbempresas%2Fcreate\";</script>";
	die;
}



use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Login;
use app\models\Tbusuarios;
use yii\helpers\ArrayHelper;
use app\models\Tbempresas;
use yii\base\ErrorException;
use yii\web\NotFoundHttpException;


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

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}
	public function actionInfo()
{
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    return [
        'message' => 'hello world',
        'code' => 100,
    ];
}
	public function actionError()
	{
		$exception = Yii::$app->errorHandler->exception;
		if ($exception !== null) {
			return $this->render('error', ['exception' => $exception]);
		}
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
		
		// $session = Yii::$app->session;
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
		$usuarios = ArrayHelper::map( $usuarios, 'IdUsuario','NombreUsuario' );
			
	
		if (empty($usuarios))
			{
				return $this->render('login', [
					 'model' => $model,
					 'mensaje' => 1,
					   
				]);
				
			}
			else
			{
				$_SESSION["usuario"]=$usuarios;
				
			// echo $_SESSION['db'];

// echo "<pre>"; print_r($_SESSION); echo "</pre>"; 


					// die;
					date_default_timezone_set('America/Bogota');
					$fecha =  date("Y-m-d H:i:s"); ;
				$connection = Yii::$app->get($_SESSION['db']);
				$command = $connection->createCommand("
					INSERT INTO
						tblog
							(
								nombreTabla,
								registroTabla,
								notaTabla,
								Aud_UsuarioEdit,
								Aud_FechaEdit
							)
						VALUES
						(
							'Inicio',
							'Ingreso al Sistema',
							'". $_SERVER['HTTP_USER_AGENT'] . " / ". $_SERVER['REMOTE_ADDR']. "',
							'". key($usuarios) ."',
							'". $fecha ."'
						)
				");
				 $command->execute();
				
			
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
