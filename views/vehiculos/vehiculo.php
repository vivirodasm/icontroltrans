<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiculosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Información fechas vencimiento vehiculo';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="vehiculasBuscar-form">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
           
        ],
		 'action' =>['vehiculos/vehiculo','placa'=>$model->placa]
    ]); ?>
	
	<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-8"><?= $form->field($model, 'placa')->textInput()->label('Placa o Nro Interno') ?>
		  </div>
	</div>
	<div class="row">
	  <div class="col-md-5"></div>
	  <div class="col-md-7"><div class="form-group">
			<?= Html::submitButton('Buscar', ['class' => 'btn btn-success']) ?>
		  </div></div>
	</div>
    
    <?php ActiveForm::end(); ?>

</div>

<div class="vehiculos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'placa',
            'NroInterno',
            // 'fechaAfil',
            // 'fechaDesafil',
            // 'estado',
            //'emprAfil',
            [
			    'attribute'=>'fechaVtoConvenio',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					return $data->validarFechas($data->fechaVtoConvenio);
				}
			],
            //'relacion',
            //'nroContrAfil',
            // 'fechaVtoContAfil',
			[
			    'attribute'=>'fechaVtoContAfil',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					return $data->validarFechas($data->fechaVtoContAfil);
				}
			],
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
            // 'fechaVtoTO',
			[
			    'attribute'=>'fechaVtoTO',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					return $data->validarFechas($data->fechaVtoTO);
				}
			],
            //'nombreCDA',
            //'nroCertCDA',
            // 'fechaVtoExtintor',
			[
			    'attribute'=>'fechaVtoExtintor',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					return $data->validarFechas($data->fechaVtoExtintor);
				}
			],
            //'fechaExpCDA',
            // 'fechaVtoCDA',
			[
			    'attribute'=>'fechaVtoCDA',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					return $data->validarFechas($data->fechaVtoCDA);
				}
			],
            //'aseguradoraSOAT',
            //'nroSOAT',
            //'fechaExpSOAT',
            // 'fechaVtoSOAT',
			[
			    'attribute'=>'fechaVtoSOAT',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					return $data->validarFechas($data->fechaVtoSOAT);
				}
			],
            //'aseguradoraRCC',
            //'nroRCC',
            //'fechaExpRCC',
            // 'fechaVtoRCC',
			[
			    'attribute'=>'fechaVtoRCC',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					return $data->validarFechas($data->fechaVtoRCC);
				}
			],
            //'aseguradoraRCE',
            //'nroRCE',
            //'fechaExpRCE',
            // 'fechaVtoRCE',
			[
			    'attribute'=>'fechaVtoRCE',
				// 'contentOptions' =>['class' => 'bg-danger text-dark','style'=>'display:block;'],
				'content'=>function($data){
					// return '<span class="glyphicon glyphicon-user">'.$data->fechaVtoConvenio.'</span>';
					return $data->validarFechas($data->fechaVtoRCE);
				}
			],
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

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
