<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use nex\chosen\Chosen;

/* @var $this yii\web\View */
/* @var $model app\models\Vehiculos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'placa')->textInput(['maxlength' => true]) ?>
	

    <?= $form->field($model, 'NroInterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaAfil')->textInput() ?>

    <?= $form->field($model, 'fechaDesafil')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emprAfil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaVtoConvenio')->textInput() ?>

    <?= $form->field($model, 'relacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nroContrAfil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaVtoContAfil')->textInput() ?>

    <?= $form->field($model, 'clase')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'claseTarifaFUEC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput() ?>

    <?= $form->field($model, 'combustible')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoTransporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehEmpresa')->textInput() ?>

    <?= $form->field($model, 'rutaVeh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'propietario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehBloqueado')->textInput() ?>

    <?= $form->field($model, 'nroMatricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orgTransito')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaExpMatric')->textInput() ?>

    <?= $form->field($model, 'linea')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cilindraje')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capacPjs')->textInput() ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'motor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chasis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nroTarjOper')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaExpTO')->textInput() ?>

    <?= $form->field($model, 'fechaVtoTO')->textInput() ?>

    <?= $form->field($model, 'nombreCDA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nroCertCDA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaVtoExtintor')->textInput() ?>

    <?= $form->field($model, 'fechaExpCDA')->textInput() ?>

    <?= $form->field($model, 'fechaVtoCDA')->textInput() ?>

    <?= $form->field($model, 'aseguradoraSOAT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nroSOAT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaExpSOAT')->textInput() ?>

    <?= $form->field($model, 'fechaVtoSOAT')->textInput() ?>

    <?= $form->field($model, 'aseguradoraRCC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nroRCC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaExpRCC')->textInput() ?>

    <?= $form->field($model, 'fechaVtoRCC')->textInput() ?>

    <?= $form->field($model, 'aseguradoraRCE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nroRCE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaExpRCE')->textInput() ?>

    <?= $form->field($model, 'fechaVtoRCE')->textInput() ?>

    <?= $form->field($model, 'carct_TV')->textInput() ?>

    <?= $form->field($model, 'carct_sonido')->textInput() ?>

    <?= $form->field($model, 'carct_banio')->textInput() ?>

    <?= $form->field($model, 'carct_sillaReclin')->textInput() ?>

    <?= $form->field($model, 'carct_aireAcond')->textInput() ?>

    <?= $form->field($model, 'carct_microf')->textInput() ?>

    <?= $form->field($model, 'carct_GPS')->textInput() ?>

    <?= $form->field($model, 'carct_Calefac')->textInput() ?>

    <?= $form->field($model, 'carct_portaEquip')->textInput() ?>

    <?= $form->field($model, 'carct_cinturSeg')->textInput() ?>

    <?= $form->field($model, 'carct_salidEmerg')->textInput() ?>

    <?= $form->field($model, 'carct_martillFrag')->textInput() ?>

    <?= $form->field($model, 'carct_luzIntNeon')->textInput() ?>

    <?= $form->field($model, 'carct_luzIndSilla')->textInput() ?>

    <?= $form->field($model, 'carct_cortinas')->textInput() ?>

    <?= $form->field($model, 'rutaImgVeh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rutaMatricula1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rutaMatricula2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rutaTOperacion1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rutaTOperacion2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rutaCDA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rutaSoat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rutaRCC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rutaRCE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Aud_Usuario')->textInput() ?>

    <?= $form->field($model, 'Aud_Fecha')->textInput() ?>

    <?= $form->field($model, 'Aud_UsuarioEdit')->textInput() ?>

    <?= $form->field($model, 'Aud_FechaEdit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
