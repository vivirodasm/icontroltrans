<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TercerosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Terceros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terceros-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Terceros', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtercero',
            'dv_tercero',
            'IdEmpresa',
            'idIdentidad',
            'idSociedad',
            //'naturalez_tercero',
            //'nombre1_tercero',
            //'nombre2_tercero',
            //'apellido1_tercero',
            //'apellido2_tercero',
            //'nombrecompleto',
            //'nombreComercial',
            //'direccion_tercero',
            //'tel_tercero',
            //'movil_tercero',
            //'idCenPob',
            //'idpaises',
            //'contacto_tercero',
            //'ced_Contacto',
            //'dir_contacto',
            //'tel_contacto',
            //'mail_tercero',
            //'autData',
            //'tipo_tercero',
            //'obs_tercero',
            //'estado',
            //'rutaRut',
            //'rutaCedula',
            //'Aud_Usuario',
            //'Aud_Fecha',
            //'Aud_UsuarioEdit',
            //'Aud_FechaEdit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
