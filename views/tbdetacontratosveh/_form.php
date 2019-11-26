<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use nex\chosen\Chosen;
/* @var $this yii\web\View */
/* @var $model app\models\Tbdetacontratosveh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbdetacontratosveh-form" >

    <?php // $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'idContrato')->textInput() ?>

	<div class="row" id="contratosVeh_<?php echo $num; ?>" style="display: none">
		<!-- <div class="col-md-2">-->
		<!-- <?php // $form->field($model, "[$num]idContrato")->hiddenInput()->label(false) ?> -->
			<?= $form->field($model, "[$num]anioContrato")->hiddenInput(["value"=>date("Y")])->label(false) ?>
			
	<!--	</div>-->
		
		<div class="col-md-2">
			
			<?= $form->field($model, "[$num]placa")->widget(
						Chosen::className(), [
							'items' => $placa,
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Vehiculo',
					])?>
		</div>
		
			


		
		
		<div class="col-md-2">
			<?php 
			echo $form->field($model, "[$num]horaIniMan")->widget(TimePicker::classname(), [
				'options' => 
				[
					'readOnly' => true,
					'showMeridian'=>false,
					'value'=>'12:00 AM'
				]]);?>
		</div>


		<div class="col-md-2">
			<?php 
			echo $form->field($model, "[$num]horaFinMan")->widget(TimePicker::classname(), [
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
