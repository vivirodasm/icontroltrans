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

    <?= $form->field($model, 'idContrato')->textInput() ?>

    <?= $form->field($model, 'anioContrato')->textInput() ?>

    <?= $form->field($model, 'placa')->textInput(['maxlength' => true]) ?>
	
	<?php 
	echo $form->field($model, 'horaIniMan')->widget(TimePicker::classname(), [
		'options' => 
		[
			'readOnly' => true,
			'showMeridian'=>false,
		]]);?>
	

<?php 
	echo $form->field($model, 'horaFinMan')->widget(TimePicker::classname(), [
		'options' => 
		[
			'readOnly' => true,
			'showMeridian'=>false,
		]]);?>


    <div class="form-group">
        <?php //= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php //ActiveForm::end(); ?>

</div>
