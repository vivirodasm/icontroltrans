<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Terceros */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="terceros-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
	<div class="col-md-3">
		 <?= $form->field($model, 'idtercero')->textInput(['maxlength' => true]) ?>
	</div>

	<div class="col-md-1">
	 <?= $form->field($model, 'dv_tercero')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-md-4">
		<?= $form->field($model, 'IdEmpresa')->DropDownList($empresa) ?>
	</div>
	
</div>

    <?= $form->field($model, 'idIdentidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idSociedad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'naturalez_tercero')->DropDownList($naturalezTercero,['maxlength' => true]) ?>
	
<div class="row">

	<div class="col-md-3">
		<?= $form->field($model, 'nombre1_tercero')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-md-3">
		<?= $form->field($model, 'nombre2_tercero')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-md-3">
		<?= $form->field($model, 'apellido1_tercero')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-md-3">
		<?= $form->field($model, 'apellido2_tercero')->textInput(['maxlength' => true]) ?>
	</div>

</div>

    <?= $form->field($model, 'nombrecompleto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombreComercial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion_tercero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_tercero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'movil_tercero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idCenPob')->textInput() ?>

    <?= $form->field($model, 'idpaises')->DropDownList($paises,['maxlength' => true]) ?>

    <?= $form->field($model, 'contacto_tercero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ced_Contacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dir_contacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_contacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mail_tercero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'autData')->textInput() ?>

    <?= $form->field($model, 'tipo_tercero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'obs_tercero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rutaRut')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rutaCedula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Aud_Usuario')->textInput() ?>

    <?= $form->field($model, 'Aud_Fecha')->textInput() ?>

    <?= $form->field($model, 'Aud_UsuarioEdit')->textInput() ?>

    <?= $form->field($model, 'Aud_FechaEdit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
