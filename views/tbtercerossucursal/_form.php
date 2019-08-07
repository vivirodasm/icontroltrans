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
		
		<?= $form->field($model, "idtercero")->widget(
				Chosen::className(), [
					'items' => $Idtercero,
					'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
					'multiple' => false,
					'clientOptions' => [
						'search_contains' => true,
						'single_backstroke_delete' => false,
					],
					'placeholder' => 'Seleccione algunos grupos',
		])?>


    <?= $form->field($model, 'nombreSucursalTer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccionSucursalTer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telSucursalTer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'movilSucursalTer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contactoSucursalTer')->textInput(['maxlength' => true]) ?>

	
	<?= $form->field($model, "ciudadSucursalTer")->widget(
			Chosen::className(), [
				'items' => [],
				'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
				'multiple' => false,
				'clientOptions' => [
					'search_contains' => true,
					'single_backstroke_delete' => false,
				],
				'placeholder' => 'Seleccione una ciudad',
		])?>
	
	
	

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
