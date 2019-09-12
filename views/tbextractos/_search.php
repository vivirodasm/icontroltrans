<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbextractosBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbextractos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'consFUEC') ?>

    <?= $form->field($model, 'FUEC') ?>

    <?= $form->field($model, 'anioExtracto') ?>

    <?= $form->field($model, 'idExtracto') ?>

    <?= $form->field($model, 'antFUEC') ?>

    <?php // echo $form->field($model, 'idtercero') ?>

    <?php // echo $form->field($model, 'fechaExtracto') ?>

    <?php // echo $form->field($model, 'resp_Contrato') ?>

    <?php // echo $form->field($model, 'cedResp_Contrato') ?>

    <?php // echo $form->field($model, 'dirResp_Contrato') ?>

    <?php // echo $form->field($model, 'telResp_Contrato') ?>

    <?php // echo $form->field($model, 'convenioEmp') ?>

    <?php // echo $form->field($model, 'fechaVtoConvenio') ?>

    <?php // echo $form->field($model, 'nroContrato') ?>

    <?php // echo $form->field($model, 'anioContrato') ?>

    <?php // echo $form->field($model, 'fechaInicio') ?>

    <?php // echo $form->field($model, 'fechaFin') ?>

    <?php // echo $form->field($model, 'ciudadOrigen') ?>

    <?php // echo $form->field($model, 'ciudadDestino') ?>

    <?php // echo $form->field($model, 'destinosVarios') ?>

    <?php // echo $form->field($model, 'idDestino') ?>

    <?php // echo $form->field($model, 'descripDestino') ?>

    <?php // echo $form->field($model, 'idRuta') ?>

    <?php // echo $form->field($model, 'descripRuta') ?>

    <?php // echo $form->field($model, 'idvehiculo') ?>

    <?php // echo $form->field($model, 'vehVtoTO') ?>

    <?php // echo $form->field($model, 'vehVtoExtintor') ?>

    <?php // echo $form->field($model, 'vehVtoCDA') ?>

    <?php // echo $form->field($model, 'vehVtoSOAT') ?>

    <?php // echo $form->field($model, 'vehVtoRCC') ?>

    <?php // echo $form->field($model, 'vehVtoRCE') ?>

    <?php // echo $form->field($model, 'vehVtoBimestral') ?>

    <?php // echo $form->field($model, 'vlrServicio') ?>

    <?php // echo $form->field($model, 'vlrFUEC') ?>

    <?php // echo $form->field($model, 'vlrCONTBFUEC') ?>

    <?php // echo $form->field($model, 'vlrRecibido') ?>

    <?php // echo $form->field($model, 'rboFUEC') ?>

    <?php // echo $form->field($model, 'tipoContrato') ?>

    <?php // echo $form->field($model, 'notaExtracto') ?>

    <?php // echo $form->field($model, 'validoPDF') ?>

    <?php // echo $form->field($model, 'membreteEmp') ?>

    <?php // echo $form->field($model, 'anuladoFUEC') ?>

    <?php // echo $form->field($model, 'facturado') ?>

    <?php // echo $form->field($model, 'GrupoFUEC') ?>

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
