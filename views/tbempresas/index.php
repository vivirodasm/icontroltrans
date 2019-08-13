<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\TbempresasControllerBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbempresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbempresas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbempresas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nit',
            'nombre',
            'dsn',
            'usuario',
            'password',
            //'charset',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
