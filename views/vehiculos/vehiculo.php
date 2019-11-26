<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use app\models\Tbrpbimestral;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiculosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = utf8_encode('ESTADO DEL VEHÍCULO');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
th,td {
  text-align: center;
  
}
th {
  text-align: center;
  color:#337AB7;
}
</style>
<div class="vehiculasBuscar-form">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
           
        ],
		 'action' =>['vehiculos/vehiculo','placa'=>$model->placa]
    ]); ?>
	
	<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-8"><?= $form->field($model, 'placa')->textInput()->label('Placa o Lateral') ?>
		  </div>
	</div>
	<div class="row">
	  <div class="col-md-5"></div>
	  <div class="col-md-7"><div class="form-group">
			<?= Html::submitButton('Buscar', ['class' => 'btn btn-success']) ?>
		  </div></div>
	</div>
    
    <?php ActiveForm::end(); ?>

</div>

<div class="vehiculos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php 
		global $mensaje;
		global $proximaFecha;
		$mensaje = array (); 
		$proximaFecha = array (); 
	?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
			// ['contentOptions' => ['style'=>'text-color:red;']],
            ['class' => 'yii\grid\SerialColumn'],

            'placa',
            'NroInterno',
            // 'fechaAfil',
            // 'fechaDesafil',
            // 'estado',
            //'emprAfil',
            [
			    'attribute'=>'fechaVtoConvenio',
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>'; Array ( [fecha] => Sin datos [mensaje] => )
					
					$valor = $data->validarFechas($data->fechaVtoConvenio, 'Convenio');
					
                    // global $mensaje;
					// global $proximaFecha;
					// if ($valor['mensaje'] != ''){
						// $mensaje[] = $valor['mensaje']; 
					// }
					// $proximaFecha['fecha'][] = $valor['fecha']; 
					// $proximaFecha['documento'][] = 'Convenio'; 
					return $valor['fecha']; 
					// $valor = substr($data->fechaVtoConvenio,0,10)  ? substr($data->fechaVtoConvenio,0,10): "Sin datos" ;
					// return $valor;
					
				}
			],
            //'relacion',
            //'nroContrAfil',
            // 'fechaVtoContAfil',
			[
			    'attribute'=>'fechaVtoContAfil',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					$valor = $data->validarFechas($data->fechaVtoContAfil, 'Contrato afiliación');
					// global $mensaje;
					// global $proximaFecha;
					// if ($valor['mensaje'] != ''){
						// $mensaje[] = $valor['mensaje']; 
					// }
					// $proximaFecha['fecha'][] = $valor['fecha']; 
					// $proximaFecha['documento'][] = 'Contrato afiliación'; 
					return $valor['fecha'];
					
					// $valor = substr($data->fechaVtoContAfil,0,10)  ? substr($data->fechaVtoContAfil,0,10): "Sin datos" ;
					// return $valor;
				}
			],
            //'clase',
            //'claseTarifaFUEC',
            //'marca',
            //'modelo',
            //'combustible',
            //'tipoTransporte',
            //'vehEmpresa',
            //'rutaVeh',
            //'propietario',
            //'observaciones',
            //'vehBloqueado',
            //'nroMatricula',
            //'orgTransito',
            //'fechaExpMatric',
            //'linea',
            //'cilindraje',
            //'capacPjs',
            //'color',
            //'motor',
            //'chasis',
            //'nroTarjOper',
            //'fechaExpTO',
            // 'fechaVtoTO',
			[
			    'attribute'=>'fechaVtoTO',
				'label'=> utf8_encode('OPERACIÓN'),
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					$valor = $data->validarFechas($data->fechaVtoTO, utf8_encode('Tarjeta operación'));
					global $mensaje;
					global $proximaFecha;
					if ($valor['mensaje'] != ''){
						$mensaje[] = $valor['mensaje']; 
					}
					$proximaFecha['fecha'][] = $valor['fecha']; 
					$proximaFecha['documento'][] = 'Tarjeta operación'; 
					return $valor['fecha'];
				}
			],
            //'nombreCDA',
            //'nroCertCDA',
            // 'fechaVtoExtintor',
			[
			    'attribute'=>'fechaVtoExtintor',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					$valor = $data->validarFechas($data->fechaVtoExtintor, 'Extintor');
					global $mensaje;
					global $proximaFecha;
					if ($valor['mensaje'] != ''){
						$mensaje[] = $valor['mensaje']; 
					}
					$proximaFecha['fecha'][] = $valor['fecha']; 
					$proximaFecha['documento'][] = 'Extintor'; 
					return $valor['fecha'];
				}
			],
			[
			    'attribute'=>'BIMESTRAL',
				'label'=>'BIMESTRAL',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					
					$placa = $data->placa;
					
					$valor = $vtoBimestral = Tbrpbimestral::find()->AndWhere("placa = '$placa'")->max('fechaVtoRPbimest');	
					$valor = $data->validarFechas(substr($valor,0,10), 'BIMESTRAL');
					global $mensaje;
					global $proximaFecha;
					if ($valor['mensaje'] != ''){
						$mensaje[] = $valor['mensaje']; 
					}
					$proximaFecha['fecha'][] = $valor['fecha']; 
					$proximaFecha['documento'][] = 'RCE'; 
					return $valor['fecha'];
				}
			],
            //'fechaExpCDA',
            // 'fechaVtoCDA',
			[
			    'attribute'=>'fechaVtoCDA',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					$valor =  $data->validarFechas($data->fechaVtoCDA , 'CDA');
					global $mensaje;
					global $proximaFecha;
					if ($valor['mensaje'] != ''){
						$mensaje[] = $valor['mensaje']; 
					}
					$proximaFecha['fecha'][] = $valor['fecha']; 
					$proximaFecha['documento'][] = 'CDA'; 
					return $valor['fecha'];
				}
			],
            //'aseguradoraSOAT',
            //'nroSOAT',
            //'fechaExpSOAT',
            // 'fechaVtoSOAT',
			[
			    'attribute'=>'fechaVtoSOAT',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					$valor = $data->validarFechas($data->fechaVtoSOAT, 'SOAT');
					global $mensaje;
					global $proximaFecha;
					if ($valor['mensaje'] != ''){
						$mensaje[] = $valor['mensaje']; 
					}
					$proximaFecha['fecha'][] = $valor['fecha']; 
					$proximaFecha['documento'][] = 'SOAT'; 
					return $valor['fecha'];
				}
			],
            //'aseguradoraRCC',
            //'nroRCC',
            //'fechaExpRCC',
            // 'fechaVtoRCC',
			[
			    'attribute'=>'fechaVtoRCC',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					$valor = $data->validarFechas($data->fechaVtoRCC, 'RCC');
					global $mensaje;
					global $proximaFecha;
					if ($valor['mensaje'] != ''){
						$mensaje[] = $valor['mensaje']; 
					}
					$proximaFecha['fecha'][] = $valor['fecha']; 
					$proximaFecha['documento'][] = 'RCC'; 
					return $valor['fecha'];
				}
			],
            //'aseguradoraRCE',
            //'nroRCE',
            //'fechaExpRCE',
            // 'fechaVtoRCE',
			[
			    'attribute'=>'fechaVtoRCE',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					$valor =  $data->validarFechas($data->fechaVtoRCE, 'RCE');
					global $mensaje;
					global $proximaFecha;
					if ($valor['mensaje'] != ''){
						$mensaje[] = $valor['mensaje']; 
					}
					$proximaFecha['fecha'][] = $valor['fecha']; 
					$proximaFecha['documento'][] = 'RCE'; 
					return $valor['fecha'];
				}
			],
			
            //'carct_TV',
            //'carct_sonido',
            //'carct_banio',
            //'carct_sillaReclin',
            //'carct_aireAcond',
            //'carct_microf',
            //'carct_GPS',
            //'carct_Calefac',
            //'carct_portaEquip',
            //'carct_cinturSeg',
            //'carct_salidEmerg',
            //'carct_martillFrag',
            //'carct_luzIntNeon',
            //'carct_luzIndSilla',
            //'carct_cortinas',
            //'rutaImgVeh',
            //'rutaMatricula1',
            //'rutaMatricula2',
            //'rutaTOperacion1',
            //'rutaTOperacion2',
            //'rutaCDA',
            //'rutaSoat',
            //'rutaRCC',
            //'rutaRCE',
            //'Aud_Usuario',
            //'Aud_Fecha',
            //'Aud_UsuarioEdit',
            //'Aud_FechaEdit',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	
<!-- div para mensajes-->

<div id="mensajes">
<?php  
	 
	 // echo "<pre>"; print_r($mensaje); echo "</pre>";
	$total = count($mensaje);
	if (count($mensaje) > 0){ 
		for($x = 0; $x < $total; $x++) {
		echo $mensaje[$x];
		echo "<br>";
		}
	}
	else{ 
	
		
			if(count($proximaFecha) > 0){
				
				$totalFechas = count($proximaFecha['fecha']); 
				
				$dias = array();
				date_default_timezone_set('America/Bogota');
				$datetime1 = date_create( date("Y-m-d") );
				
				// echo "<pre>"; print_r($proximaFecha); echo "</pre>";
				
				for($x = 0; $x < $totalFechas; $x++) {
					
					 // print_r ($proximaFecha['fecha'][$x]); echo "<br>";
					if ($proximaFecha['fecha'][$x] == 'Sin datos')
					{
						$proximaFecha1 = date("Y-m-d"); 
						$datetime2 = new DateTime($proximaFecha1);
						  // print_r($datetime2); echo "<br>";
						  
					}
					else {
						
						 $fecha = trim($proximaFecha['fecha'][$x]); 
						 $datetime2 =new DateTime($fecha);
						  // print_r($datetime2); 
						  // echo "<br>";print_r($datetime2); echo "<br>";
					}
				
					 // print_r($datetime2); echo "<br>";
					   $intervalDias = date_diff($datetime1, $datetime2);
						$dias[$x]=$intervalDias->days;
					// $intervalDias = $nombrec . " " .$intervalDias->format("%a") . " dias Para vencerse";echo "<pre>"; print_r($dias[0]->days); echo "</pre>";
				
				}
				$menorValor = min($dias);
				for($i=0;$i<count($dias);$i++)
				{
					if($dias[$i]==$menorValor){
						// echo "<br>Minimo: Se encuentra en la posición ".$i;
						echo '<span class="" style="color:  #a93226; font-size:large;">El proximo documento a vencer es: '.utf8_encode($proximaFecha['documento'][$i]). ' en la fecha '.$proximaFecha['fecha'][$i]. ' en '.$menorValor. ' dias</span><br>';
					}
				}
				 // echo "<pre>"; print_r($menorValor); echo "</pre>";
				  // echo "<pre>"; print_r($dias); echo "</pre>";
			}
	
	} 
	
	?>
</div>

</div>
