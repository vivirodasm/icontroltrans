<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Tbdetacontratosveh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbdetacontratosveh-form">

    <?php // $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'idContrato')->textInput() ?>

	<div  class="row formVehiculos">
		<div class="col-md-2">
			<?= $form->field($model, 'anioContrato[]')->textInput() ?>
		</div>
		
		<div class="col-md-2">
			<?= $form->field($model, 'placa[]')->DropDownList($placa,['maxlength' => true, 'prompt'=>'Seleccione...']) ?>
		</div>
		
		
		<div class="col-md-2">
			<?php 
			echo $form->field($model, 'horaIniMan[]')->widget(TimePicker::classname(), [
				'options' => 
				[
					'readOnly' => true,
					'showMeridian'=>false,
					'value'=>'12:00 AM'
				]]);?>
		</div>


		<div class="col-md-2">
			<?php 
			echo $form->field($model, 'horaFinMan[]')->widget(TimePicker::classname(), [
				'options' => 
				[
					'readOnly' => true,
					'showMeridian'=>false,
					'value'=>'12:00 AM'
				]]);?>
		</div>
	</div>
	
	<div id="VehiculosContrato">
	</div>
    <div class="form-group">
        <?php //= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php //ActiveForm::end(); ?>

</div>
