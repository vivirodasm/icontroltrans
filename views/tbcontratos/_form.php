
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nex\chosen\Chosen;
use dosamigos\datepicker\DatePicker;
	
/* @var $this yii\web\View */
/* @var $model app\models\Tbcontratos */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/contratos.js',['depends' => [\yii\web\JqueryAsset::className()]]);

//no funciona en el archivo externos contratos.js

//se valida la presion del boton "enter" para hacer la busqueda de los terceros
$this->registerJs( "

	$( document ).ready(function() 
	{
		$('#tbcontratos_idtercero_chosen').on( 'keydown', function(event) {
				if(event.which == 13)
				{
					var info ='';
					filtro = $(this).children('div').children().children().val();
					$.get( 'index.php?r=tbcontratos/info-tercero&filtro='+filtro,
					function( data )
					{
						$.each(data, function( index, datos) 
							{	
								info = info + '<option value='+index+'>'+datos+'</option>';
								
							});
						
						select = $('#tbcontratos-idtercero');
						select.html('');
						select.trigger('chosen:updated');
						
						select.append(info);
						select.trigger('chosen:updated');
						
						
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
	  <div class="col-md-2"><label>Nro Contrato</label>
	<?= Html::input('text', 'numContrato', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	  <div class="col-md-1"><label>Año</label><?= Html::input('text', 'anioActual', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	  <div class="col-md-2"><label>Contrato - Año</label><?= Html::input('text', 'concatenado', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	</div>
	
	<div class="row">
	  <div class="col-md-2"><label>Identificación</label>
	<?= Html::input('text', 'Identificacion', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	<div class="col-md-1"><label>DV</label>
	<?= Html::input('text', 'digitoVerificacion', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	  <div class="col-md-2"><label>Contratante</label>
	<?= Html::input('text', 'Contratante', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	  <div class="col-md-2"><label>Ciudad</label><?= Html::input('text', 'ciudad', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	  <div class="col-md-2"><label>Teléfono</label><?= Html::input('text', 'telefono', '',['class'=>'form-control','disabled'=>true,]) ?></div>
	  <div class="col-md-1"><?= $form->field($model, 'sucursalTercero')->checkbox(['maxlength' => true]) ?></div>
	</div>
	
	<div class="row">
	  
	  <div class="col-md-2"><?= $form->field($model, "sucursalActiva")->widget(
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
	  <div class="col-md-2"></div>
	</div>
	
	
	<div class="row">
	  <div class="col-md-2"><?php
					$model->tipoContrato= "OCASIONAL";
					echo $form->field($model, "tipoContrato")->widget(
						Chosen::className(), [
							'items' => $tipoContrato,
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items tbcontratos_tipocontrato_chosen
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => false,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione un tipo de contrato',
					])?></div>
	  <div class="col-md-2">
	  
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
	  <div class="col-md-2"><?= $form->field($model, 'aliasContrato')->textInput(['maxlength' => true]) ?></div>
	</div>
    
	
	<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Detalle del contrato</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">  <!-- si se necesita abierto al inicio se le pone a la clase al final  in--> 
      <div class="panel-body">
	  
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
						<div class="col-md-2"><label>Días</label><?= Html::input('text','dias','', $options=["disabled"=>true,"id"=>"dias"]) ?></div>
						<div class="col-md-2"><?= $form->field($model, 'cantVeh')->textInput(["type"=>"number","min"=>1,"max"=>10,"value"=>1]) ?></div>
						<div class="col-md-2"><?= $form->field($model, 'nroPsj')->textInput(["type"=>"number"]) ?></div>
						<div class="col-md-2"><?= $form->field($model, 'vlrContrato')->textInput(["type"=>"number"]) ?>	</div>
						
					</div>
				
			
			<div class="row">
			<div class="col-md-2"><label> Departamento origen</label>
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
		]);?></div>
			
			
			  <div class="col-md-2"><?= $form->field($model, "ciudadOrigen")->widget(
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
			
			<div class="col-md-2"><label> Departamento Destino</label>
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
		]);?></div>
			
			
			  <div class="col-md-2"><?= $form->field($model, "ciudadDestino")->widget(
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
			  <div class="col-md-3"><label>Valor en letras</label><?= Html::input('text', 'valorLetras', '',['class'=>'form-control','readonly'=>true,]) ?></div>
			</div>
				
			<div class="row">
			  <div class="col-md-12"><?= $form->field($model, 'objetCont')->textarea(['rows' => 3,"value"=> "TRANSPORTE DE UN GRUPO ESPECÍFICO DE USUARIOS O PERSONAS"]) ?></div>
			</div>

			<div class="row">
			  <div class="col-md-12"><?= $form->field($model, 'notasContrato')->textarea(['rows' => 2]) ?></div>
			</div>	
			
			<div class="row">
			  <div class="col-md-3"><?= $form->field($model, 'resp_Contrato')->textInput(['maxlength' => true ]) ?></div>
			  <div class="col-md-2"><?= $form->field($model, 'cedResp_Contrato')->textInput(['maxlength' => true ,"type"=>"number"]) ?></div>
			  <div class="col-md-2"><?= $form->field($model, 'dirResp_Contrato')->textInput(['maxlength' => true ]) ?></div>
			  <div class="col-md-2"><?= $form->field($model, 'telResp_Contrato')->textInput(['maxlength' => true ,"type"=>"number"]) ?></div>
			</div>
		
	  </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Vehiculos del contrato</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
	  
		<?php 
				for($i=1;$i<=10;$i++)
					echo $this->context->actionVehiculos($form,$i); 
			
			?>   
	  
	  </div>
    </div>
  </div>
  
</div>
	
    
    <?= $form->field($model, 'Aud_Usuario')->hiddenInput(["value"=>key($_SESSION['usuario'])])->label(false) ?>

    <?= $form->field($model, 'Aud_Fecha')->hiddenInput(["value"=> date("Y-m-d H:i:s")])->label(false) ?>

    <?= $form->field($model, 'Aud_UsuarioEdit')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'Aud_FechaEdit')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
