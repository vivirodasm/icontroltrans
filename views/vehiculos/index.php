<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiculosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vehiculos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'placa',
            'NroInterno',
            'fechaAfil',
            'fechaDesafil',
            'estado',
            //'emprAfil',
            //'fechaVtoConvenio',
            //'relacion',
            //'nroContrAfil',
            //'fechaVtoContAfil',
            //'clase',
            //'claseTarifaFUEC',
            //'marca',
            //'modelo',
            //'combustible',
            //'tipoTransporte',
            //'vehEmpresa',
            //'rutaVeh',
            //'propietario',
            //'observaciones',
            //'vehBloqueado',
            //'nroMatricula',
            //'orgTransito',
            //'fechaExpMatric',
            //'linea',
            //'cilindraje',
            //'capacPjs',
            //'color',
            //'motor',
            //'chasis',
            //'nroTarjOper',
            //'fechaExpTO',
            //'fechaVtoTO',
            //'nombreCDA',
            //'nroCertCDA',
            //'fechaVtoExtintor',
            //'fechaExpCDA',
            //'fechaVtoCDA',
            //'aseguradoraSOAT',
            //'nroSOAT',
            //'fechaExpSOAT',
            //'fechaVtoSOAT',
            //'aseguradoraRCC',
            //'nroRCC',
            //'fechaExpRCC',
            //'fechaVtoRCC',
            //'aseguradoraRCE',
            //'nroRCE',
            //'fechaExpRCE',
            //'fechaVtoRCE',
            //'carct_TV',
            //'carct_sonido',
            //'carct_banio',
            //'carct_sillaReclin',
            //'carct_aireAcond',
            //'carct_microf',
            //'carct_GPS',
            //'carct_Calefac',
            //'carct_portaEquip',
            //'carct_cinturSeg',
            //'carct_salidEmerg',
            //'carct_martillFrag',
            //'carct_luzIntNeon',
            //'carct_luzIndSilla',
            //'carct_cortinas',
            //'rutaImgVeh',
            //'rutaMatricula1',
            //'rutaMatricula2',
            //'rutaTOperacion1',
            //'rutaTOperacion2',
            //'rutaCDA',
            //'rutaSoat',
            //'rutaRCC',
            //'rutaRCE',
            //'Aud_Usuario',
            //'Aud_Fecha',
            //'Aud_UsuarioEdit',
            //'Aud_FechaEdit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
