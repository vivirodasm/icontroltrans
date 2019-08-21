<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nex\chosen\Chosen;
use dosamigos\datepicker\DatePicker;
	
/* @var $this yii\web\View */
/* @var $model app\models\Tbcontratos */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/contratos.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<div class="tbcontratos-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="row">
	  <div class="col-md-4"><?= $form->field($model, "idtercero")->widget(
						Chosen::className(), [
							'items' => $Idtercero,
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione un tercero',
					])?></div>
	  <div class="col-md-4"></div>
	  <div class="col-md-4"></div>
	</div>
	
	<hr>
	<div class="row">
	  <div class="col-md-4"><label>Nro Contrato</label>
	<?= Html::input('text', 'numContrato', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	  <div class="col-md-4"><label>Año</label><?= Html::input('text', 'anioActual', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	  <div class="col-md-4"><label>Contrato - Año</label><?= Html::input('text', 'concatenado', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	</div>
	
	<div class="row">
	  <div class="col-md-3"><label>Identificación</label>
	<?= Html::input('text', 'Identificacion', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	<div class="col-md-1"><label>Código</label>
	<?= Html::input('text', 'digitoVerificacion', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	  <div class="col-md-3"><label>Contratante</label>
	<?= Html::input('text', 'Contratante', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	  <div class="col-md-3"><label>Ciudad</label><?= Html::input('text', 'ciudad', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	  <div class="col-md-2"><label>Teléfono</label><?= Html::input('text', 'telefono', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	</div>
	
	<div class="row">
	  <div class="col-md-2"><?= $form->field($model, 'sucursalTercero')->checkbox(['maxlength' => true]) ?></div>
	  <div class="col-md-4"><?= $form->field($model, "sucursalActiva")->widget(
						Chosen::className(), [
							'items' => [],
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione una sucursal',
							
					])?></div>
	  <div class="col-md-4"></div>
	</div>
	
	
	<div class="row">
	  <div class="col-md-4"><?= $form->field($model, "tipoContrato")->widget(
						Chosen::className(), [
							'items' => $tipoContrato,
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione un tipo de contrato',
					])?></div>
	  <div class="col-md-4"><?= $form->field($model, "estado")->widget(
						Chosen::className(), [
							'items' => $estado,
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione el estado',
					])?></div>
	  <div class="col-md-4"><?= $form->field($model, 'aliasContrato')->textInput(['maxlength' => true]) ?></div>
	</div>
    
	
	
	<div class="tabs-index">


		<!-- Nav tabs -->
	<ul class="nav nav-tabs">
	  <li class="nav-item active">
		<a class="nav-link active" data-toggle="tab" href="#detalle">Detalle del contrato</a>
	  
	   

	  
	  
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#vehiculos">Vehiculos del contrato</a>
	  </li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
	  <div class="tab-pane container active" id="detalle">
			
					<div class="row">
					  <div class="col-md-2"><?= $form->field($model, 'fechaInicio')->widget(
					DatePicker::className(), [
					'template' 		=> '{addon}{input}',
					'language' 		=> 'es',
					'clientOptions' => [
						'autoclose' 	=> true,
						'format' 		=> 'yyyy-mm-dd'
					],
				]);  
			?></div>
					  <div class="col-md-2"><?= $form->field($model, 'fechaFin')->widget(
						DatePicker::className(), [
						'template' 		=> '{addon}{input}',
						'language' 		=> 'es',
						'clientOptions' => [
							'autoclose' 	=> true,
							'format' 		=> 'yyyy-mm-dd'
						],
					]);  
				?></div>
					  <div class="col-md-2"><label>Días</label>
				<?= Html::input('text','dias','', $options=["disabled"=>true,"id"=>"dias"]) ?></div>
					<div class="col-md-2"><?= $form->field($model, 'cantVeh')->textInput(["type"=>"number"]) ?></div>
					<div class="col-md-2"><?= $form->field($model, 'nroPsj')->textInput(["type"=>"number"]) ?></div>
					<div class="col-md-2"><?= $form->field($model, 'vlrContrato')->textInput(["type"=>"number"]) ?>	</div>
						
					</div>
				
			
			<div class="row">
			  <div class="col-md-4"><?= $form->field($model, "ciudadOrigen")->widget(
				Chosen::className(), [
					'items' => [],
					'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
					'multiple' => false,
					'clientOptions' => [
						'search_contains' => true,
						'single_backstroke_delete' => false,
					],
					'placeholder' => 'Seleccione la ciudad origen',
			])?></div>
			  <div class="col-md-4"><?= $form->field($model, "ciudadDestino")->widget(
				Chosen::className(), [
					'items' => [],
					'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
					'multiple' => false,
					'clientOptions' => [
						'search_contains' => true,
						'single_backstroke_delete' => false,
					],
					'placeholder' => 'Seleccione la ciudad destino',
			])?></div>
			  <div class="col-md-4"><label>Valor en letras</label><?= Html::input('text', 'ciudad', '',['class'=>'form-control','disabled'=>true,]) ?></div>
			</div>
				
			<div class="row">
			  <div class="col-md-8"><?= $form->field($model, 'objetCont')->textarea(['rows' => 6]) ?></div>
			  <div class="col-md-2"></div>
			  <div class="col-md-2"></div>
			</div>

			<div class="row">
			  <div class="col-md-8"><?= $form->field($model, 'notasContrato')->textarea(['rows' => 4]) ?></div>
			  <div class="col-md-2"></div>
			  <div class="col-md-2"></div>
			</div>	
			
			<div class="row">
			  <div class="col-md-3"><?= $form->field($model, 'resp_Contrato')->textInput(['maxlength' => true]) ?></div>
			  <div class="col-md-3"><?= $form->field($model, 'cedResp_Contrato')->textInput(['maxlength' => true ,"type"=>"number"]) ?></div>
			  <div class="col-md-3"><?= $form->field($model, 'dirResp_Contrato')->textInput(['maxlength' => true]) ?></div>
			  <div class="col-md-3"><?= $form->field($model, 'telResp_Contrato')->textInput(['maxlength' => true ,"type"=>"number"]) ?></div>
			</div>	

				
					
	  </div>
	  <div class="tab-pane container fade" id="vehiculos">
		 <?= $this->context->actionVehiculos();   ?>
	  </div>
	</div>


</div>

    
    <?= $form->field($model, 'Aud_Usuario')->hiddenInput(["value"=>''])->label(false) ?>

    <?= $form->field($model, 'Aud_Fecha')->hiddenInput(["value"=> date("Y-m-d H:i:s")])->label(false) ?>

    <!--<?= $form->field($model, 'Aud_UsuarioEdit')->textInput() ?>

    <?= $form->field($model, 'Aud_FechaEdit')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
