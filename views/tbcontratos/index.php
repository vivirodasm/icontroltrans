<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbcontratosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbcontratos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbcontratos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbcontratos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'consContrato',
            'nroContrato',
            'idContrato',
            'anioContrato',
            'idtercero',
            //'sucursalActiva',
            //'sucursalTercero',
            //'tipoContrato',
            //'fechaInicio',
            //'fechaFin',
            //'ciudadOrigen',
            //'ciudadDestino',
            //'objetCont:ntext',
            //'cantVeh',
            //'nroPsj',
            //'vlrContrato',
            //'estado',
            //'aliasContrato',
            //'notasContrato',
            //'resp_Contrato',
            //'cedResp_Contrato',
            //'dirResp_Contrato',
            //'telResp_Contrato',
            //'Aud_Usuario',
            //'Aud_Fecha',
            //'Aud_UsuarioEdit',
            //'Aud_FechaEdit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
