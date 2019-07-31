<?php

namespace app\controllers;

use Yii;
use app\models\Terceros;
use app\models\TercerosBuscar;
use app\models\Tbempresa;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use app\models\Tbpaises;
use app\models\Tbsociedades;
use app\models\Tbidentidades;
use app\models\Tbpoblaciones;

/**
 * TercerosController implements the CRUD actions for Terceros model.
 */
class TercerosController extends Controller
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
     * Lists all Terceros models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TercerosBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Terceros model.
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
     * Creates a new Terceros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Terceros();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idtercero]);
        }

		
		
		$empresa = Tbempresa::find()->where( 'IdEmpresa=1' )->all();		
		$empresa = ArrayHelper::map( $empresa, 'IdEmpresa', 'Nombre' );
		
		$paises = Tbpaises::find()->all();
		$paises = ArrayHelper::map( $paises, 'idpaises', 'nombrePais' );
		
		$sociedades = Tbsociedades::find()->all();
		$sociedades = ArrayHelper::map( $sociedades, 'idSociedad', 'nombreSociedad' );
		
		$identidades = Tbidentidades::find()->all();
		$identidades = ArrayHelper::map( $identidades, 'idIdentidad', 'nombreIdentidad' );
		
		$naturalezTercero = ["N" => "PERSONA NATURAL", "J"=>"PERSONA JURIDICA"];
		
		$estado = ["ACTIVO" => "ACTIVO", "INACTIVO"=>"INACTIVO"];
		
		$cedulaUsuario = 1053779647;
		$tipoTercero = ["CLIENTE"=>"CLIENTE","CONDUCTOR"=>"CONDUCTOR","PROPIETARIO"=>"PROPIETARIO","EMPLEADO"=>"EMPLEADO","PROVEEDOR"=>"PROVEEDOR","PRESTADOR SERVICIO"=>"PRESTADOR SERVICIO"];
		
		
        return $this->render('create', [
            'model' 			=> $model,
			'empresa'			=> $empresa,
			'naturalezTercero' 	=> $naturalezTercero,
			'paises'			=> $paises,
			'sociedades'		=> $sociedades,
			'identidades' 		=> $identidades,
			'estado'			=> $estado,
			'tipoTercero'		=> $tipoTercero,
			'cedulaUsuario'		=> $cedulaUsuario,
        ]);
    }

    /**
     * Updates an existing Terceros model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idtercero]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
	
	
	public function actionCiudades($idPais)
	{
		
		if (is_numeric($idPais))
		{
			$datosCiudades = Tbpoblaciones::find()->all();
			$datosCiudades = ArrayHelper::toArray($datosCiudades);
			
			foreach ($datosCiudades as $ciudad)
			{
				$ciudades[$ciudad['idCenPob']] =  $ciudad['CentroPoblado'] . "-" . $ciudad['Municipio'] . "-" . $ciudad['Departamento'];
			}
			
			return json_encode($ciudades);
		}
	
		
	}

    /**
     * Deletes an existing Terceros model.
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
     * Finds the Terceros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Terceros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Terceros::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
