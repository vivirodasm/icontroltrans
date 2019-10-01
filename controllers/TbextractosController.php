<?php
namespace app\controllers;

// sesion
if(!isset($_SESSION['db']))
{ 
	$this->registerJs( "
	  swal.fire({
		  title: 'Importante',
		  text: 'Su sesión a terminado',
		  type: 'warning',
		  confirmButtonText: 'Loguearse',
		  cancelButtonText: 'Cancelar',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33'
		  
		}).then((result) => {
  if (result.value) {
    window.location=\"index.php?r=site%2Findex\";
  }
})
	
	");
	
} 
//si no tiene sesion se redirecciona al login
// else
// {
	// echo "<script> window.location=\"index.php?r=site%2Flogin\";</script>";
	// die;
// }



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
use app\models\Terceros;
use app\models\Tbempresa;
use app\models\Tbdestinosfuec;
use app\models\Tbhv;
use app\models\Tbextractoscond;
use app\models\Pdfextractos;

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

        if ($model->load(Yii::$app->request->post()) ) 
		{
			
			$añoActual = date("Y");
			$nroContrato = str_pad(Yii::$app->request->post()['Tbextractos']['nroContrato'], 4, "0", STR_PAD_LEFT);
			$idExtracto = Tbextractos::find()->select('max(idExtracto)')->andWhere(" anioContrato = $añoActual ")->scalar() +1; //
			$idExtracto = str_pad($idExtracto , 4, "0", STR_PAD_LEFT);
			
			$model->anioExtracto = $añoActual;
			$datosEmp= Tbempresa::find()->one();
			
			//Tbempresa codDirTerritorial y  nroResolucionEmp y  fechaHab y año actual(2019 solo 19) y #contrato y Tbextracto idExtracto
			$FUEC = $datosEmp->codDirTerritorial . $datosEmp->nroResolucionEmp . substr($datosEmp->fechaHab,2,2) . $añoActual . $nroContrato. $idExtracto ;
	
			$model->FUEC = $FUEC ;		
			$model->idExtracto = $idExtracto;
			$model->nroContrato = $nroContrato;
			$model->anioContrato = substr($model->fechaInicio,0,4);
			
			$model->Aud_Usuario = $_SESSION['usuario'];
			$model->Aud_Fecha = date("Y-m-d");
			
		
			// $model->save(false);
			
			
			$post = Yii::$app->request->post();
			for ( $i = 0; $i <= count($post['conductor']) - 1; $i++ )
			{
				$conductor = $post['conductor'][$i];
				$idhv = Tbhv::find()->AndWhere("idtercero = $conductor ")->one();
				$idhv = $idhv->idhv;
				$nombreConductor= Terceros::find()->AndWhere(["idtercero" => $conductor ])->one()->nombrecompleto;
				$conductorExtracto =  new Tbextractoscond();
				$conductorExtracto->FUEC = $FUEC;
				$conductorExtracto->idhv = $idhv;
				$conductorExtracto->licencia = $post['nroLicencia'][$i];
				$conductorExtracto->vigLicencia = $post['vigLicencia'][$i]; 
				$conductorExtracto->ultPagoSS = $post['vtoSegSocial'][$i];
				
				$arraConductores[$i]["nombre"]= $nombreConductor;
				$arraConductores[$i]["cc"]= $conductor;
				$arraConductores[$i]['nroLicencia']=$post['nroLicencia'][$i];
				$arraConductores[$i]['vigLicencia']=$post['vigLicencia'][$i]; 
				
				// $conductorExtracto->save();
			}

			
			
			$datosVehiculos = Vehiculos::find()->AndWhere([ "placa" => $post ['Tbextractos']['idvehiculo'] ])->one();
			
			$nombreContratante= Terceros::find()->AndWhere(["idtercero" => $post['Tbextractos']['idtercero'] ])->one()->nombrecompleto;
			
			$objetoContrato = Tbcontratos::find()->andWhere(["nroContrato" => $nroContrato ."-" .$añoActual])->one()->objetCont;
			
			 
			$poblacionOrigen = Tbpoblaciones::find()->andWhere(["idCenPob" =>$post ['Tbextractos']['ciudadOrigen']  ])->one();
			$poblacionDestino = Tbpoblaciones::find()->andWhere(["idCenPob" =>$post ['Tbextractos']['ciudadDestino']  ])->one();
			 
			
			
			$datos = 
			[
				"FUEC"=>$FUEC,
				"nombreEmpresa"=> $_SESSION['nombre'],
				"nitEmpresa"=> $_SESSION['nit'],
				"nroContrato" =>$nroContrato,
				"rtn" =>$datosEmp->RNT ,
				"nombreContratante" => $nombreContratante,
				"nitContratante" => $post['Tbextractos']['idtercero'],
				"objetoContrato" => $objetoContrato ,
				"departamentoOrigen" => $poblacionOrigen->Departamento,
				"ciudadOrigen" => $poblacionOrigen->CentroPoblado,
				"departamentoDestino" => $poblacionDestino->Departamento,
				"ciudadDestino" => $poblacionDestino->CentroPoblado,
				"recorrido" => $post['Tbextractos']['descripRuta'],
				"tipoContrato" => $post['Tbextractos']['tipoContrato'],
				"convenioEmp" => $post['Tbextractos']['convenioEmp'],
				"fechaInicio" => $post['Tbextractos']['fechaInicio'],
				"fechaFin"	 => $post['Tbextractos']['fechaFin'],
				"placa"	 =>	$post['Tbextractos']['idvehiculo'],
				"interno" => $datosVehiculos->NroInterno,
				"marca" =>$datosVehiculos->marca,
				"clase" =>$datosVehiculos->clase,
				"modelo" => $datosVehiculos->	modelo,
				"nroTarjeta" =>$datosVehiculos->nroTarjOper,
				"conductores" => $arraConductores,
				"responsableContrato" 	=> $post['Tbextractos']['resp_Contrato'] ,
				"cedula"  => $post['Tbextractos']['cedResp_Contrato'] ,
				"direccion" 	=> $post['Tbextractos']['dirResp_Contrato'] ,
				"telefono" 	=> $post['Tbextractos']['telResp_Contrato'],
				"direccionEmpresa" => $datosEmp->Dirección
			];
			
			
			$pdf = new Pdfextractos();
			$pdf->generarPdf($datos);
		
			die;
			
			
			
            // return $this->redirect(['view', 'anioExtracto' => $model->anioExtracto, 'idExtracto' => $model->idExtracto, 'nroContrato' => $model->nroContrato, 'anioContrato' => $model->anioContrato]);
        }	
		
		$rutas = $this->obtenerRutas();
		$vehiculos = $this->vehiculos();
		$departamentos = $this->departamentos();
		$variosDestinos =  $this->variosDestinos();
        return $this->render('create', [
            'model' => $model,
			'rutas' => $rutas,
			'departamentos' => $departamentos, 
			'vehiculos' => $vehiculos,
			'variosDestinos' => $variosDestinos,
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
	
	
	public function actionCiudad($idCenPob)
	{
		$departamentos = Tbpoblaciones::find()->andWhere("idCenPob = $idCenPob")->all();
		$departamentos = ArrayHelper::map($departamentos,"idCenPob","CentroPoblado");
		
		echo json_encode( $departamentos );
	}
	
	
	public function actionCiudades($idPais,$idCenPob)
	{
		
		if (is_numeric($idPais))
		{
			$datosCiudades = Tbpoblaciones::find()->andWhere("idCenPob = '$idCenPob'")->all();
			$datosCiudades = ArrayHelper::toArray($datosCiudades);
			
			foreach ($datosCiudades as $ciudad)
			{
				$ciudades[$ciudad['idCenPob']] =  $ciudad['CentroPoblado'] . "-" . $ciudad['Municipio'] . "-" . $ciudad['Departamento'];
			}
			
			return json_encode($ciudades);
		}
	}
	
	
	public function actionInfoContrato($nroContrato)
	{
		
		$contratos = Tbcontratos::find()->andWhere("anioContrato =". date("Y"). " and nroContrato =" .str_pad($nroContrato, 4, "0", STR_PAD_LEFT) )->all();
		$contratos = ArrayHelper::toArray( $contratos );
		
		$contabilidadFuec = Tbempresa::find()->andWhere([ "Nombre" =>$_SESSION['nombre'] ])->all();
		$contabilidadFuec = ArrayHelper::getColumn( $contabilidadFuec,"contabilidadFUEC" ); 
		
		$contratos[0]['contabilidadFuec'] = $contabilidadFuec[0]/100;
		
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
		
		// $infoVehiculosEmpAfil =  ArrayHelper::map($infoVehiculos,'emprAfil','emprAfil');
		$infoVehiculosEmprAfil= $infoVehiculos;
		
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
		
		$vtoBimestral = Tbrpbimestral::find()->AndWhere("placa = '$placa'")->max('fechaVtoRPbimest');		
		
			
		//dar formato a las fechas vencidas
		foreach ($infoVehiculos as $key => $vehi)
			$infoVehiculos[$key]['fecha'] = $this->vencimientofecha($vehi['fecha']);
		
		$infoVehiculos['fechaVtoRPbimest']['nombre'] ="Revisión Bimestra";
		$infoVehiculos['fechaVtoRPbimest']['fecha'] = $this->vencimientofecha(substr($vtoBimestral,0,10));
		
		$fechasVencidas = [];
		foreach ($infoVehiculos as $info)
		{
			if (strpos ( $info['fecha'] , "vencido" ) > 0)
			{
				$fechasVencidas[] = $info['nombre'];
			}
			else
			{
				$fechas[] = $info['fecha'];
				$nombres[] = $info['nombre'];
			}
			
		}
			
		//saber si tiene alguna fecha vencida o cual es la mas proxima a vencerse
		$estadoDoc ="";
		if (count ($fechasVencidas) > 0)
		{
			foreach ($fechasVencidas as $fv)
			{
				$estadoDoc .= $fv ." vencido <br>";
			}
		}
		else
		{
			date_default_timezone_set('America/Bogota');
			$datetime1 = date_create( date("Y-m-d") );
			$datetime2 = date_create(min($fechas));
			$intervalDias = date_diff($datetime1, $datetime2);
			$intervalDias = " " .$intervalDias->format("%a") . " días para vencerse";
			
			$estadoDoc = $nombres[array_search (min($fechas),$fechas)]. $intervalDias ;
		
		}

		
		$infoVehiculos['estadoDocumentos'] = $estadoDoc;
		
		
		
		
		$infoVehiculos['emprAfil']['emprAfil'] = $infoVehiculosEmprAfil->emprAfil;
		$infoVehiculos['emprAfil']['fechaVtoConvenio'] = $infoVehiculosEmprAfil->fechaVtoConvenio;
		
		//tipo de vehiculo clase
		$infoVehiculos['clase'] = $infoVehiculosEmprAfil->claseTarifaFUEC;
		
		
		
		
		echo json_encode( $infoVehiculos );
	}

	private function fechaVencida($nombrec,$fecha)
	{
		date_default_timezone_set('America/Bogota');
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
		date_default_timezone_set('America/Bogota');
		if(strlen($fecha) == 0)
			return "No posee";
		elseif (date("Y-m-d") >  $fecha )
			return $fecha.'vencido';
		else
			return $fecha;
		
	}
	
	
	public function actionInfoResponsable($idtercero,$btn)
	{
		
		$tercero = Terceros::find()->AndWhere("idtercero = $idtercero")->all();
		$tercero = ArrayHelper::toArray($tercero)[0];
		
		$infoinfoContacto = [];
		if($btn == "btnTercero")
		{
			$infoContacto['nombre'] 		= $tercero['nombrecompleto'];
			$infoContacto['identificacion'] = $tercero['idtercero'];
			$infoContacto['direccion'] 		= $tercero['direccion_tercero'];
			$infoContacto['movil'] 			= $tercero['movil_tercero'];
			
		}
		elseif($btn == "btnConTercero")
		{
			$infoContacto['nombre'] 		= $tercero['contacto_tercero'];
			$infoContacto['identificacion'] = $tercero['ced_Contacto'];
			$infoContacto['direccion'] 		= $tercero['dir_contacto'];
			$infoContacto['movil'] 			= $tercero['tel_contacto'];
			
		}
		
			echo json_encode($infoContacto);
	}
	
	public function actionConductores($placa)
	{
		

		$connection = Yii::$app->get($_SESSION['db']);
		$command = $connection->createCommand("
			SELECT 
			t.nombrecompleto,
			h.idtercero,
			h.licencia,
			h.vigLicencia,
			s.vtoSegSocial
		FROM 
			tbdetaconductores AS c, 
			tbhv AS h, 
			terceros AS t, 
			tbsegsocial AS s
		WHERE 
			c.idVeh = '$placa'
		AND
			c.idhv = h.idhv
		AND 
			h.estado = 'ACTIVO'
		AND
			s.idhv = h.idhv
		AND 
			h.idtercero = t.idtercero
			
		GROUP BY h.idtercero
		");
		$result = $command->queryAll();
		
		echo json_encode($result); 
		// return $result;
		
	}

	private function variosDestinos()
	{
		$variosDestinos = Tbdestinosfuec::find()->all();
		$variosDestinos = ArrayHelper::map($variosDestinos,'idDestinoFUEC','nombreDestinoFUEC');
		
		return $variosDestinos;
	}
	
	public function actionDecripcionDestino($idDestinoFUEC)
	{
		$descripcion = Tbdestinosfuec::find()->andWhere("idDestinoFUEC = $idDestinoFUEC")->all();
		$descripcion = ArrayHelper::getColumn($descripcion,'decripcionDestinoFUEC','');
		
		echo json_encode ($descripcion[0]);
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
	
	public function actionFuecAnterior($fuecAnt)
	{
		

		$connection = Yii::$app->get($_SESSION['db']);
		$command = $connection->createCommand("
			SELECT 
			tbter.nombrecompleto,
			tbter.idtercero,
			tbext.resp_Contrato,
			tbext.cedResp_Contrato,
			tbext.dirResp_Contrato,
			tbext.telResp_Contrato,
            tbext.ciudadOrigen,
            tbext.ciudadDestino,
            tbext.descripRuta
			
		FROM 
			tbextractos as tbext, terceros as tbter
		WHERE 
			tbext.FUEC = '$fuecAnt'

		AND
			tbext.idtercero = tbter.idtercero
			
		
		");
		$result = $command->queryAll();
		
		//consulta ciudad origen  1765
		$command = $connection->createCommand("SELECT `CentroPoblado` FROM `tbpoblaciones` WHERE `idCenPob`=".$result[0]['ciudadOrigen']);
		$ciudadOrigen = $command->queryAll();
		// $result[0]['ciudadOrigen']=$ciudadOrigen[0]['CentroPoblado'];
		$result[0]['idciudadOrigen']=$result[0]['ciudadOrigen'];
		
		//consulta ciudad destino  
		$command = $connection->createCommand("SELECT `CentroPoblado` FROM `tbpoblaciones` WHERE `idCenPob`=".$result[0]['ciudadDestino']);
		$ciudadDestino = $command->queryAll();
		
		// $result[0]['ciudadDestino']=$ciudadDestino[0]['CentroPoblado'];
		$result[0]['idciudadDestino']=$result[0]['ciudadDestino'];
		echo json_encode($result[0]); 

		
	}
}
