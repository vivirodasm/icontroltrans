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
use app\models\Vehiculos;
use app\models\VehiculosBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VehiculosController implements the CRUD actions for Vehiculos model.
 */
class VehiculosController extends Controller
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
     * Lists all Vehiculos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VehiculosBuscar();
		$model = new Vehiculos();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            
			
        ]);
    }

    /**
     * Displays a single Vehiculos model.
     * @param string $id
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
     * Creates a new Vehiculos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vehiculos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->placa]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vehiculos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->placa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vehiculos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vehiculos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Vehiculos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vehiculos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	    /**
     * Lists all Vehiculos models.
     * @return mixed
     */
    public function actionVehiculo()
    {
        
		$placa = @$_POST['Vehiculos']['placa'];
		// print_r($_POST);
		// die;
		$searchModel = new VehiculosBuscar();
		$model = new Vehiculos();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		if ($placa != ""){
			$dataProvider->query->andWhere( 
			['or',
				['like', 'placa', '%'. $placa . '%', false],
				['like', 'NroInterno', '%'. $placa . '%', false]
			]);
		}
		else{
			$dataProvider->query->andWhere( "placa =null");
		}
		

        return $this->render('vehiculo', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
			
        ]);
    }
}
