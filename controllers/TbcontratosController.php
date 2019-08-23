<?php

namespace app\controllers;

use Yii;
use app\models\Tbcontratos;
use app\models\TbcontratosBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Terceros;
use app\models\Tbtercerossucursal;
use app\models\Tbdetacontratosveh;


/**
 * TbcontratosController implements the CRUD actions for Tbcontratos model.
 */
class TbcontratosController extends Controller
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
	
	public $estado = 
	[
		"ACTIVO" => "ACTIVO", 
		"INACTIVO" => "INACTIVO"
	];
	
	
	public $tipoContrato = 
	[
		"EMPRESARIAL" => "EMPRESARIAL -> CONTRATO PARA TRANSPORTE EMPRESARIAL",
		"ESCOLAR" => "ESCOLAR -> CONTRATO PARA TRANSPORTE DE ESTUDIENTES",
		"OCASIONAL" => "OCASIONAL -> CONTRATO PARA TRANSPORTE DE UN GRUPO ESPECIFICO DE USUARIOS",
		"SALUD" => "SALUD CONTRATO -> PARA TRANSPORTE DE USUARIOS DEL SERVICIO DE SALUD ",
		"TURISTICO" => "TURISTICO -> CONTRATO PARA TRANSPORTE DE TURISTAS",
	];

    /**
     * Lists all Tbcontratos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbcontratosBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbcontratos model.
     * @param integer $idContrato
     * @param integer $anioContrato
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idContrato, $anioContrato)
    {
        return $this->render('view', [
            'model' => $this->findModel($idContrato, $anioContrato),
        ]);
    }

    /**
     * Creates a new Tbcontratos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tbcontratos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idContrato' => $model->idContrato, 'anioContrato' => $model->anioContrato]);
        }

		
		
        return $this->render('create', [
            'model' => $model,
			'estado' => $this->estado,
			'tipoContrato' => $this->tipoContrato,
        ]);
    }

	

	


    /**
     * Updates an existing Tbcontratos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idContrato
     * @param integer $anioContrato
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idContrato, $anioContrato)
    {
        $model = $this->findModel($idContrato, $anioContrato);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idContrato' => $model->idContrato, 'anioContrato' => $model->anioContrato]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


	public function actionSucursal($idtercero)
	{
		$sucursales = tbtercerossucursal::find()->AndWhere("idtercero = $idtercero")->all();
		$sucursales =  ArrayHelper::map($sucursales,'idterceroSucursal','nombreSucursalTer');
		
		return json_encode($sucursales);
	}
	
	
	public function actionVehiculos($form)
	{
		$model = new Tbdetacontratosveh();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->placa]);
		}

		return $this->renderPartial('../tbdetacontratosveh/create', [
			'model' => $model,
			'form'  => $form,
		]);
	}


	public function actionTercero($idtercero)
	{
		$tercero = Terceros::find()->AndWhere("idtercero = $idtercero")->all();
		$tercero = ArrayHelper::toArray($tercero, 'idtercero');
		return json_encode($tercero[0]);
	}


	public function actionInfoTercero($filtro)
	{
		
		$tercero = Terceros::find()
		->andWhere(['or',
			['like', 'idtercero', '%'. $filtro . '%', false],
			['like', 'nombrecompleto', '%'. $filtro . '%', false]
			])
		->all();	
		$tercero = ArrayHelper::map( $tercero, 'idtercero', 'nombrecompleto' );	
		
		return json_encode($tercero);	
	}

    /**
     * Deletes an existing Tbcontratos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idContrato
     * @param integer $anioContrato
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idContrato, $anioContrato)
    {
        $this->findModel($idContrato, $anioContrato)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tbcontratos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idContrato
     * @param integer $anioContrato
     * @return Tbcontratos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idContrato, $anioContrato)
    {
        if (($model = Tbcontratos::findOne(['idContrato' => $idContrato, 'anioContrato' => $anioContrato])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
