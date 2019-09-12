<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbextractosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbextractos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbextractos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbextractos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'consFUEC',
            'FUEC',
            'anioExtracto',
            'idExtracto',
            'antFUEC',
            //'idtercero',
            //'fechaExtracto',
            //'resp_Contrato',
            //'cedResp_Contrato',
            //'dirResp_Contrato',
            //'telResp_Contrato',
            //'convenioEmp',
            //'fechaVtoConvenio',
            //'nroContrato',
            //'anioContrato',
            //'fechaInicio',
            //'fechaFin',
            //'ciudadOrigen',
            //'ciudadDestino',
            //'destinosVarios',
            //'idDestino',
            //'descripDestino:ntext',
            //'idRuta',
            //'descripRuta:ntext',
            //'idvehiculo',
            //'vehVtoTO',
            //'vehVtoExtintor',
            //'vehVtoCDA',
            //'vehVtoSOAT',
            //'vehVtoRCC',
            //'vehVtoRCE',
            //'vehVtoBimestral',
            //'vlrServicio',
            //'vlrFUEC',
            //'vlrCONTBFUEC',
            //'vlrRecibido',
            //'rboFUEC',
            //'tipoContrato',
            //'notaExtracto',
            //'validoPDF',
            //'membreteEmp',
            //'anuladoFUEC',
            //'facturado',
            //'GrupoFUEC',
            //'Aud_Usuario',
            //'Aud_Fecha',
            //'Aud_UsuarioEdit',
            //'Aud_FechaEdit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
