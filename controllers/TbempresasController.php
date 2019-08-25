<?php

namespace app\controllers;

use Yii;
use app\models\Tbempresas;
use app\models\TbempresasBuscar;
use app\controllers\TbempresasControllerBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoginForm;

/**
 * TbempresasController implements the CRUD actions for Tbempresas model.
 */
class TbempresasController extends Controller
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
     * Lists all Tbempresas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbempresasBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbempresas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tbempresas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$connection = Yii::$app->getDb();
		
        $model = new Tbempresas();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
            
			
			$model = new Tbempresas();
		
			$nit = $_POST['Tbempresas']['nit'];
			$conexion = Yii::$app->db;
			
			$consulta = "SELECT * FROM tbempresas";
			$consulta .= " WHERE nit ='" .$nit."' AND estado = 1";
			
			$resultado = $conexion->createCommand($consulta)->queryAll();
		
		
		
			if (empty($resultado))
			{
				return $this->render('create', [
					 'model' => $model,
					 'validarEmpresa' => 1,
					   
				]);
				
			}
			else{
				
				session_destroy(); 	
		session_start();	
				// print_r($resultado);
				
				$session = Yii::$app->session;
				
				$_SESSION["nit"]=$resultado[0]['nit'];
				// print_r($nit);
				$_SESSION["nombre"]=$resultado[0]['nombre'];
				$_SESSION["dsn"]=$resultado[0]['dsn'];
				$_SESSION["usuario"]=$resultado[0]['usuario'];
				$_SESSION["password"]=$resultado[0]['password'];
				$_SESSION["charset"]=$resultado[0]['charset'];
				
				$nombre = $_SESSION["nombre"];
				$dns = $_SESSION["dsn"];
				$usuario = $_SESSION["usuario"];
				$password = $_SESSION["password"];
				$charset = $_SESSION["charset"];
				
				// exec ("echo ^<?php return [ 'class' =^> 'yii\db\Connection', 'dsn' =^> '$dns', 'username' =^> '$usuario',     'password' =^> '$password',  'charset' =^> '$charset', ]^; >../config/db1.php");
				
				// print_r($_SESSION); die();
				require('../config/db1.php');
				 $conexion1 = Yii::$app->db1;
				 
				 // $config = require '../config/db.php';
				// (new yii\web\Application($config))->run();
				 // $config = Yii::$app->db;
				 
				return $this->render('create', [
					 'model' => $model,
					 'validarEmpresa' => 2,
					   
				]);
			}
			
			
			// return $this->redirect(['view', 'id' => $model->nit]);
        }

        return $this->render('create', [
            'model' => $model,
			'validarEmpresa' => 0,
        ]);
    }

    /**
     * Updates an existing Tbempresas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nit]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tbempresas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tbempresas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tbempresas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tbempresas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	    /**
     * valida el nit en la base de datos del hosting
     * If it is successful, the browser will be redirected to the 'login' page.
     * @param integer $nit
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAutenticarEmpresa()
    {
        // $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->nit]);
        // }
		
		$model = new Tbempresas();
		
		$nit = $_POST['Tbempresas']['nit'];
		$conexion = Yii::$app->db1;
		
		$consulta = "SELECT * FROM tbempresas";
		$consulta .= " WHERE nit ='" .$nit."' AND estado = 1";
		
		$resultado = $conexion->createCommand($consulta)->queryAll();
		
		
		
		// if (empty($resultado))
		// {
			// return $this->renderAjax('create', [
				 // 'model' => $model,
				 // 'validarEmpresa' => false,
				   
			// ]);
			
		// }
		// else{
			// // print_r($resultado);
			// $nit=$resultado[0]['nit'];
			// // print_r($nit);
			// $nombre=$resultado[0]['nombre'];
			// $dsn=$resultado[0]['dsn'];
			// $usuario=$resultado[0]['usuario'];
			// $password=$resultado[0]['password'];
			// $charset=$resultado[0]['charset'];
			
			// return $this->renderAjax('create', [
				 // 'model' => $model,
				 // 'validarEmpresa' => true,
				   
			// ]);
		// }
    }
	
	public function actionLogin()
	{
		$modelLogin = new LoginForm();
		return $this->renderPartial('../site/login', [
             'model' => $modelLogin,
        ]);
		
	}
	
	
	
}
