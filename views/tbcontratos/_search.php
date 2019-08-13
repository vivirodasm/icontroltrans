<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbcontratosBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbcontratos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'consContrato') ?>

    <?= $form->field($model, 'nroContrato') ?>

    <?= $form->field($model, 'idContrato') ?>

    <?= $form->field($model, 'anioContrato') ?>

    <?= $form->field($model, 'idtercero') ?>

    <?php // echo $form->field($model, 'sucursalActiva') ?>

    <?php // echo $form->field($model, 'sucursalTercero') ?>

    <?php // echo $form->field($model, 'tipoContrato') ?>

    <?php // echo $form->field($model, 'fechaInicio') ?>

    <?php // echo $form->field($model, 'fechaFin') ?>

    <?php // echo $form->field($model, 'ciudadOrigen') ?>

    <?php // echo $form->field($model, 'ciudadDestino') ?>

    <?php // echo $form->field($model, 'objetCont') ?>

    <?php // echo $form->field($model, 'cantVeh') ?>

    <?php // echo $form->field($model, 'nroPsj') ?>

    <?php // echo $form->field($model, 'vlrContrato') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'aliasContrato') ?>

    <?php // echo $form->field($model, 'notasContrato') ?>

    <?php // echo $form->field($model, 'resp_Contrato') ?>

    <?php // echo $form->field($model, 'cedResp_Contrato') ?>

    <?php // echo $form->field($model, 'dirResp_Contrato') ?>

    <?php // echo $form->field($model, 'telResp_Contrato') ?>

    <?php // echo $form->field($model, 'Aud_Usuario') ?>

    <?php // echo $form->field($model, 'Aud_Fecha') ?>

    <?php // echo $form->field($model, 'Aud_UsuarioEdit') ?>

    <?php // echo $form->field($model, 'Aud_FechaEdit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
