<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiculosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'InformaciÃ³n fechas vencimiento vehiculo';
$this->params['breadcrumbs'][] = $this->title;
?>

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
		$mensaje = array (); 
	?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'placa',
            'NroInterno',
            // 'fechaAfil',
            // 'fechaDesafil',
            // 'estado',
            //'emprAfil',
            [
			    'attribute'=>'fechaVtoConvenio',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>'; Array ( [fecha] => Sin datos [mensaje] => )
					
					$valor = $data->validarFechas($data->fechaVtoConvenio, 'Convenio');
                    global $mensaje;
					$mensaje[] = $valor['mensaje']; 
					// echo $(div).html()
					// print_r($mensaje);
					return $valor['fecha']; 
					
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
					global $mensaje;
					$mensaje[] = $valor['mensaje']; 
					return $valor['fecha'];
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
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					$valor = $data->validarFechas($data->fechaVtoTO, 'Tarjeta operación');
					global $mensaje;
					$mensaje[] = $valor['mensaje']; 
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
					$mensaje[] = $valor['mensaje']; 
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
					$mensaje[] = $valor['mensaje'];  print_r($valor['mensaje']);
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
					$mensaje[] = $valor['mensaje']; 
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
					$mensaje[] = $valor['mensaje']; 
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
					$mensaje[] = $valor['mensaje']; 
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
	// print_r($mensaje);
$total = count($mensaje);
if ($mensaje != ''){
		for($x = 0; $x < $total; $x++) {
		echo $mensaje[$x];
		echo "<br>";
		}
} ?>
</div>

</div>
