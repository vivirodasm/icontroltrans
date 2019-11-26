<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nex\chosen\Chosen;
/* @var $this yii\web\View */
/* @var $model app\models\Terceros */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/jquery.blockUI.js',['depends' => [\yii\web\JqueryAsset::className()]]);



?>  

<script>  

// $("#aaa").val();

	// 

</script>


<div class="terceros-form border border-primary rounded-lg">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-md-2">
			 <?= $form->field($model, 'idtercero')->textInput(['maxlength' => true,'type' => 'number']) ?>
		</div>

		<div class="col-md-1">
		 <?= $form->field($model, 'dv_tercero')->textInput(['maxlength' => true,'type' => 'number']) ?>
		</div>
		
		<div class="col-md-5">
			<?= $form->field($model, 'IdEmpresa')->DropDownList($empresa) ?>
		</div>
		
	</div>

  <div class="row">
	  <div class="col-md-2">
		<?= $form->field($model, 'idIdentidad')->DropDownList($identidades,['maxlength' => true,"prompt"=>"Seleccione..."]) ?>
	  </div>
	  <div class="col-md-3">
		<?= $form->field($model, 'idSociedad')->DropDownList($sociedades,['maxlength' => true,"prompt"=>"Seleccione..."]) ?>
	  </div>
	  <div class="col-md-3">
		<?= $form->field($model, 'naturalez_tercero')->DropDownList($naturalezTercero,['maxlength' => true,"prompt"=>"Seleccione..."]) ?>
	  </div>
	</div>
	
	<div class="row">

		<div class="col-md-2">
			<?= $form->field($model, 'nombre1_tercero')->textInput(['maxlength' => true]) ?>
		</div>
		
		<div class="col-md-2">
			<?= $form->field($model, 'nombre2_tercero')->textInput(['maxlength' => true]) ?>
		</div>
		
		<div class="col-md-2">
			<?= $form->field($model, 'apellido1_tercero')->textInput(['maxlength' => true]) ?>
		</div>
		
		<div class="col-md-2">
			<?= $form->field($model, 'apellido2_tercero')->textInput(['maxlength' => true]) ?>
		</div>

	</div>
	
	<div class="row">
	  <div class="col-md-4">
		<?= $form->field($model, 'nombrecompleto')->textInput(['maxlength' => true]) ?>
	  </div>
	  <div class="col-md-4">
		<?= $form->field($model, 'nombreComercial')->textInput(['maxlength' => true]) ?>
	  </div>
	  
	</div>
	
	<div class="row">
	  <div class="col-md-4">
		<?= $form->field($model, 'direccion_tercero')->textInput(['maxlength' => true]) ?>
	  </div>
	  <div class="col-md-2">
		<?= $form->field($model, 'tel_tercero')->textInput(['maxlength' => true,'type' => 'number']) ?>
	  </div>
	  <div class="col-md-2">
		<?= $form->field($model, 'movil_tercero')->textInput(['maxlength' => true,'type' => 'number']) ?>
	  </div>
	</div>
    
	<div class="row">
	  <div class="col-md-2">
	  <?= $form->field($model, "idpaises")->widget(
						Chosen::className(), [
							'items' => $paises,
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
					])?>
	  </div>
	  
	    <div class="col-md-3"><label> Departamento</label>
	  <?= Chosen::widget([
			'name' => 'departamentos',
			'items' => $departamentos,
			'allowDeselect' => false,
			'disableSearch' => false, // Search input will be disabled
			'clientOptions' => [
				'search_contains' => true,
				'max_selected_options' => 1,
			],
			'placeholder' => 'Seleccione un Departamento',
		]);?>
				</div>
	  <div class="col-md-3">
	  <?= $form->field($model, "idCenPob")->widget(
					Chosen::className(), [
						'items' => [],
						'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
						'multiple' => false,
						'clientOptions' => [
							'search_contains' => true,
							'single_backstroke_delete' => false,
						],
						'placeholder' => 'Seleccione una Ciudad',
				])?>
	  </div>
	</div>
    
	<div class="row">
	 <div class="col-md-4">
		<?= $form->field($model, 'contacto_tercero')->textInput(['maxlength' => true]) ?>
	 </div>
	 <div class="col-md-2">
		<?= $form->field($model, 'ced_Contacto')->textInput(['maxlength' => true,'type' => 'number']) ?>
	 </div>
	</div>

	<div class="row">
	  <div class="col-md-6">
		<?= $form->field($model, 'dir_contacto')->textInput(['maxlength' => true]) ?>
	  </div>
	  <div class="col-md-2">
		<?= $form->field($model, 'tel_contacto')->textInput(['maxlength' => true,'type' => 'number']) ?>
	  </div>
	</div>
	
	<div class="row">
	  <div class="col-md-4">
		<?= $form->field($model, 'mail_tercero')->input('email',['maxlength' => true]) ?>
	  </div>
	  <div class="col-md-2">
			 <?= $form->field($model, 'tipo_tercero')->DropDownList($tipoTercero,['maxlength' => true]) ?>
		</div>

		<div class="col-md-2">
			<?= $form->field($model, 'estado')->DropDownList($estado,['maxlength' => true]) ?>
		</div>
	</div>
	
    <div class="row">
	  <div class="col-md-8"><?= $form->field($model, 'obs_tercero')->textarea(['rows' => '3']) ?></div>
	</div>
	
	<div class="row">
		<div class="col-md-8">
				<?= $form->field($model, 'autData')->checkbox( ["value" => 0]) ?>
		</div>
	</div>
    
    

    <?= $form->field($model, 'rutaRut')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'rutaCedula')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'Aud_Usuario')->hiddenInput(["value"=>key($_SESSION['usuario'])])->label(false) ?>

    <?= $form->field($model, 'Aud_Fecha')->hiddenInput(["value"=> date("Y-m-d H:i:s")])->label(false) ?>

    <?= $form->field($model, 'Aud_UsuarioEdit')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'Aud_FechaEdit')->hiddenInput()->label(false) ?>

    <div class="row">
	  <div class="col-md-3"></div>
	  <div class="col-md-4"><div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div></div>
	  <div class="col-md-2"></div>
	</div>
	

    <?php ActiveForm::end(); ?>

</div>
