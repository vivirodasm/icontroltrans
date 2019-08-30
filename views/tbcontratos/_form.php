
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nex\chosen\Chosen;
use dosamigos\datepicker\DatePicker;
	
/* @var $this yii\web\View */
/* @var $model app\models\Tbcontratos */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/contratos.js',['depends' => [\yii\web\JqueryAsset::className()]]);

$this->registerJs( "

	$( document ).ready(function() 
	{
		$('#tbcontratos_idtercero_chosen').on( 'keydown', function(event) {
				if(event.which == 13)
				{
					var info ='';
					filtro = $('#tbcontratos_idtercero_chosen').children('div').children().children().val();
					$.get( 'index.php?r=tbcontratos/info-tercero&filtro='+filtro,
					function( data )
					{
						$.each(data, function( index, datos) 
							{	
								info = info + '<option value='+index+'>'+datos+'</option>';
								
							});
						$('#tbcontratos-idtercero').append(info);
						$('#tbcontratos-idtercero').trigger('chosen:updated');
						
						
					},'json'
						);
					
				}
		});
	});
		
");
	
?>
<div class="tbcontratos-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="row">
	  <div class="col-md-4"><?= $form->field($model, "idtercero")->widget(
						Chosen::className(), [
							'items' => ["item1"=>""],
							'disableSearch' => 0, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione un tercero',
							'noResultsText' => "Enter para buscar",
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
	  <div class="col-md-4"><?=$form->field($model, "tipoContrato")->widget(
						Chosen::className(), [
							'items' => $tipoContrato,
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => false,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione un tipo de contrato',
					])?></div>
	  <div class="col-md-4">
	  
	  <?php 
		
		$model->estado = "ACTIVO";
	  echo $form->field($model, "estado")->widget(
						Chosen::className(), [
							'items' => $estado,
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'value' => 'ACTIVO',
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
					<div class="col-md-2"><?= $form->field($model, 'cantVeh')->textInput(["type"=>"number","min"=>0,"max"=>10,"value"=>0]) ?></div>
					<div class="col-md-2"><?= $form->field($model, 'nroPsj')->textInput(["type"=>"number"]) ?></div>
					<div class="col-md-2"><?= $form->field($model, 'vlrContrato')->textInput(["type"=>"number"]) ?>	</div>
						
					</div>
				
			
			<div class="row">
			<label> Departamento origen</label>
			<?= Chosen::widget([
			'name' => 'departamentoCiudadOrigen',
			'items' => $departamento,
			'allowDeselect' => false,
			'disableSearch' => false, // Search input will be disabled
			'clientOptions' => [
				'search_contains' => true,
				'max_selected_options' => 1,
			],
			'placeholder' => 'Seleccione un Departamento',
		]);?>
			
			
			  <div class="col-md-4"><?= $form->field($model, "ciudadOrigen")->widget(
				Chosen::className(), [
					'items' => ["item1"=>""],
					'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
					'multiple' => false,
					'clientOptions' => [
						'search_contains' => true,
						'single_backstroke_delete' => false,
					],
					'placeholder' => 'Seleccione la ciudad origen',
			])?></div>
			
			<label> Departamento Destino</label>
			<?= Chosen::widget([
			'name' => 'departamentoCiudadDestino',
			'items' => $departamento,
			'allowDeselect' => false,
			'disableSearch' => false, // Search input will be disabled
			'clientOptions' => [
				'search_contains' => true,
				'max_selected_options' => 1,
			],
			'placeholder' => 'Seleccione un Departamento',
		]);?>
			
			
			  <div class="col-md-4"><?= $form->field($model, "ciudadDestino")->widget(
				Chosen::className(), [
					'items' => ["item1"=>""],
					'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
					'multiple' => false,
					'clientOptions' => [
						'search_contains' => true,
						'single_backstroke_delete' => false,
					],
					'placeholder' => 'Seleccione la ciudad destino',
			])?></div>
			  <div class="col-md-4"><label>Valor en letras</label><?= Html::input('text', 'valorLetras', '',['class'=>'form-control','disabled'=>true,]) ?></div>
			</div>
				
			<div class="row">
			  <div class="col-md-8"><?= $form->field($model, 'objetCont')->textarea(['rows' => 6,"value"=> "Transporte de un grupo especifico de usuarios o personas"]) ?></div>
			  <div class="col-md-2"></div>
			  <div class="col-md-2"></div>
			</div>

			<div class="row">
			  <div class="col-md-8"><?= $form->field($model, 'notasContrato')->textarea(['rows' => 4]) ?></div>
			  <div class="col-md-2"></div>
			  <div class="col-md-2"></div>
			</div>	
			
			<div class="row">
			  <div class="col-md-3"><?= $form->field($model, 'resp_Contrato')->textInput(['maxlength' => true,'disabled'=>true]) ?></div>
			  <div class="col-md-3"><?= $form->field($model, 'cedResp_Contrato')->textInput(['maxlength' => true ,"type"=>"number",'disabled'=>true]) ?></div>
			  <div class="col-md-3"><?= $form->field($model, 'dirResp_Contrato')->textInput(['maxlength' => true,'disabled'=>true]) ?></div>
			  <div class="col-md-3"><?= $form->field($model, 'telResp_Contrato')->textInput(['maxlength' => true ,"type"=>"number",'disabled'=>true]) ?></div>
			</div>	

				
					
	  </div>
	  <div class="tab-pane container fade" id="vehiculos">
		
				
			<?php 
				for($i=1;$i<=10;$i++)
				echo  $this->context->actionVehiculos($form,$i); 
			
			?>   
			
		
		</script>
	  </div>
	</div>


</div>

    
    <?= $form->field($model, 'Aud_Usuario')->hiddenInput(["value"=>1])->label(false) ?>

    <?= $form->field($model, 'Aud_Fecha')->hiddenInput(["value"=> date("Y-m-d H:i:s")])->label(false) ?>

    <?= $form->field($model, 'Aud_UsuarioEdit')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'Aud_FechaEdit')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
