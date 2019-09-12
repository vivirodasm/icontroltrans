<?php

namespace app\controllers;

use Yii;
use app\models\Tbextractos;
use app\models\TbextractosBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Tbrutas;
use app\models\Tbcontratos;
use app\models\Tbpoblaciones;
use app\models\Vehiculos;
use app\models\Tbrpbimestral;

/**
 * TbextractosController implements the CRUD actions for Tbextractos model.
 */
class TbextractosController extends Controller
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
     * Lists all Tbextractos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbextractosBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbextractos model.
     * @param integer $anioExtracto
     * @param integer $idExtracto
     * @param integer $nroContrato
     * @param integer $anioContrato
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($anioExtracto, $idExtracto, $nroContrato, $anioContrato)
    {
        return $this->render('view', [
            'model' => $this->findModel($anioExtracto, $idExtracto, $nroContrato, $anioContrato),
        ]);
    }

    /**
     * Creates a new Tbextractos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tbextractos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'anioExtracto' => $model->anioExtracto, 'idExtracto' => $model->idExtracto, 'nroContrato' => $model->nroContrato, 'anioContrato' => $model->anioContrato]);
        }

	
		
		$rutas = $this->obtenerRutas();
		$vehiculos = $this->vehiculos();
		$departamentos = $this->departamentos();
		
        return $this->render('create', [
            'model' => $model,
			'rutas' => $rutas,
			'departamentos' => $departamentos, 
			'vehiculos' => $vehiculos,
        ]);
    }
	
	
	private function obtenerRutas()
	{
		$rutas = Tbrutas::find()->all();
		$rutas = ArrayHelper::map( $rutas, 'idRuta', 'nombreRuta' );
		
		return $rutas;
	
	}
	
	
	public function actionRutas($idRuta)
	{
		$rutas = Tbrutas::find()->andWhere("idRuta = $idRuta")->all();
		$rutas = ArrayHelper::getColumn( $rutas, 'decripcionRuta' );
		
		echo json_encode($rutas);
	}
	
	
	public function actionContratos($nroContrato)
	{
		
		$contratos = Tbcontratos::find()->andWhere("anioContrato =". date("Y"). " and nroContrato like '%$nroContrato%' "  )->all();
		$contratos = ArrayHelper::map( $contratos, 'idContrato','nroContrato' );
		
		echo json_encode( $contratos );
		
	}
	
	private function departamentos()
	{
	
		$departamentos = Tbpoblaciones::find()->select("Departamento")->groupBy("Departamento")->all();
		$departamentos = ArrayHelper::map($departamentos,"Departamento","Departamento");
		
		return $departamentos;
	
	}
	
	
	
	public function actionInfoContrato($nroContrato)
	{
		
		$contratos = Tbcontratos::find()->andWhere("anioContrato =". date("Y"). " and nroContrato like '%$nroContrato%' "  )->all();
		$contratos = ArrayHelper::toArray( $contratos, 'idContrato','nroContrato' );
		
		echo json_encode( $contratos[0] );
		
	}
	
	//todos los vehiculos 
	private function vehiculos()
	{
		$infoVehiculos = Vehiculos::find()->all();
		$infoVehiculos = ArrayHelper::map( $infoVehiculos,'placa','NroInterno' );
		$vehiculos = [];
		
		foreach ($infoVehiculos as $key => $info)
			$vehiculos[$key] = "placa ". $key ." - lateral ". $info; 
			
		return $vehiculos;
	}
	
	public function actionDocVehiculos($placa)
	{
		$infoVehiculos = Vehiculos::find()->andWhere(["placa" => $placa])->one();
		// $infoVehiculos = ArrayHelper::toArray( $infoVehiculos );
		
		
		$infoVehiculos = ArrayHelper::getValue($infoVehiculos, function ($infoVehiculos, $defaultValue) {
			
			$arrayInfo['fechaVtoTO']['nombre'] = "Tarjeta Operación";
			$arrayInfo['fechaVtoTO']['fecha'] = substr($infoVehiculos->fechaVtoTO,0,10);
			
			$arrayInfo['fechaVtoExtintor']['nombre'] = "Extintor";
			$arrayInfo['fechaVtoExtintor']['fecha'] = substr($infoVehiculos->fechaVtoExtintor,0,10);
			
			$arrayInfo['fechaVtoCDA']['nombre'] = "CDA";
			$arrayInfo['fechaVtoCDA']['fecha'] = substr($infoVehiculos->fechaVtoCDA,0,10);
			
			$arrayInfo['fechaVtoSOAT']['nombre'] = "SOAT";
			$arrayInfo['fechaVtoSOAT']['fecha'] = substr($infoVehiculos->fechaVtoSOAT,0,10);
			
			$arrayInfo['fechaVtoRCC']['nombre'] = "RCC";
			$arrayInfo['fechaVtoRCC']['fecha'] = substr($infoVehiculos->fechaVtoRCC,0,10);
			
			$arrayInfo['fechaVtoRCE']['nombre'] = "RCE";
			$arrayInfo['fechaVtoRCE']['fecha'] = substr($infoVehiculos->fechaVtoRCE,0,10);
				
			return $arrayInfo;
		});
		
		$vehEstado = [];
		
		//llenar el array con la informacion del estado actual de los documentos del vehiculo
		foreach ($infoVehiculos as $vehi)
			$vehEstado[ $vehi['nombre'] ]= $this->fechaVencida($vehi['nombre'],$vehi['fecha']);
			
			
			// echo "<pre>"; print_r($infoVehiculos); echo "</pre>"; 
		//dar formato a las fechas vencidas
		foreach ($infoVehiculos as $key => $vehi)
			$infoVehiculos[$key]['fecha'] = $this->vencimientofecha($vehi['fecha']);
		
		// echo "<pre>"; print_r($infoVehiculos); echo "</pre>"; 
		//vencimiento bimestral del vehiculo
		$vtoBimestral = Tbrpbimestral::find()->AndWhere("placa = '$placa'")->max('fechaVtoRPbimest');
		
		$infoVehiculos['fechaVtoRPbimest'] = $vtoBimestral;
		
		$infoVehiculos['estadoDocumentos'] = $vehEstado;
		
		// echo "<pre>"; print_r($infoVehiculos); echo "</pre>"; 
		
		echo json_encode( $infoVehiculos );
	}

	private function fechaVencida($nombrec,$fecha)
	{
		if (date("Y-m-d") >  $fecha )
		{
			return "$nombrec vencido";
		}
		else
		{
			$datetime1 = date_create( date("Y-m-d") );
			$datetime2 = date_create($fecha);
			$intervalDias = date_diff($datetime1, $datetime2);
			$intervalDias = $nombrec . " " .$intervalDias->format("%a") . " dias Para vencerse";
			return $intervalDias;
			
		}
	}
	
	private function vencimientofecha($fecha)
	{
		
		if(strlen($fecha) == 0)
			return "no posee  ";
		elseif (date("Y-m-d") >  $fecha )
			return $fecha.'vencido';
		else
			return $fecha;
		
	}

    /**
     * Updates an existing Tbextractos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $anioExtracto
     * @param integer $idExtracto
     * @param integer $nroContrato
     * @param integer $anioContrato
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($anioExtracto, $idExtracto, $nroContrato, $anioContrato)
    {
        $model = $this->findModel($anioExtracto, $idExtracto, $nroContrato, $anioContrato);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'anioExtracto' => $model->anioExtracto, 'idExtracto' => $model->idExtracto, 'nroContrato' => $model->nroContrato, 'anioContrato' => $model->anioContrato]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
	
	
	

    /**
     * Deletes an existing Tbextractos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $anioExtracto
     * @param integer $idExtracto
     * @param integer $nroContrato
     * @param integer $anioContrato
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($anioExtracto, $idExtracto, $nroContrato, $anioContrato)
    {
        $this->findModel($anioExtracto, $idExtracto, $nroContrato, $anioContrato)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tbextractos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $anioExtracto
     * @param integer $idExtracto
     * @param integer $nroContrato
     * @param integer $anioContrato
     * @return Tbextractos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($anioExtracto, $idExtracto, $nroContrato, $anioContrato)
    {
        if (($model = Tbextractos::findOne(['anioExtracto' => $anioExtracto, 'idExtracto' => $idExtracto, 'nroContrato' => $nroContrato, 'anioContrato' => $anioContrato])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
