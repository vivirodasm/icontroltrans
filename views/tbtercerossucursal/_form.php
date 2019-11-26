<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nex\chosen\Chosen;
/* @var $this yii\web\View */
/* @var $model app\models\Tbtercerossucursal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbtercerossucursal-form">

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
					'placeholder' => 'Seleccione el tercero',
		])?></div>
		  <div class="col-md-4"></div>
		  <div class="col-md-4"></div>
		</div>
		<hr>
		
		<div class="row">
		  <div class="col-md-4"> <?= $form->field($model, 'nombreSucursalTer')->textInput(['maxlength' => true]) ?></div>
		  <div class="col-md-3"><?= $form->field($model, 'direccionSucursalTer')->textInput(['maxlength' => true]) ?></div>
		 
		</div>
		
		<div class="row">
		  <div class="col-md-2"><?= $form->field($model, 'telSucursalTer')->textInput(['maxlength' => true]) ?></div>
		  <div class="col-md-2"><?= $form->field($model, 'movilSucursalTer')->textInput(['maxlength' => true]) ?></div>
		  <div class="col-md-3"><?= $form->field($model, 'contactoSucursalTer')->textInput(['maxlength' => true]) ?></div>
		</div>
   
		<div class="row">
		  
		  
		    <div class="col-md-2"><label> Departamento</label>
	  <?= Chosen::widget([
			'name' => 'departamentoSucursal',
			'items' => $departamento,
			'allowDeselect' => false,
			'disableSearch' => false, // Search input will be disabled
			'clientOptions' => [
				'search_contains' => true,
				'max_selected_options' => 1,
			],
			'placeholder' => 'Seleccione un Departamento',
		]);?>
				</div>
		  
		  <div class="col-md-2"><?= $form->field($model, "ciudadSucursalTer")->widget(
			Chosen::className(), [
				'items' => ["0"=>""],
				'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
				'multiple' => false,
				'clientOptions' => [
					'search_contains' => true,
					'single_backstroke_delete' => false,
				],
				'placeholder' => 'Seleccione una ciudad',
		])?></div>
		
			<div class="col-md-2"><br><div class="form-group">
			<?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
			</div></div>
		</div>
		
    	

    

    <?php ActiveForm::end(); ?>

</div>
