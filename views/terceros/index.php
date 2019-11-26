<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TercerosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\controllers\TbtercerossucursalController;
$this->title = 'Terceros';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/terceros.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/sucursales.js',['depends' => [\yii\web\JqueryAsset::className()]]);

if( $get = @$_GET['guardado'])
{
	echo '<script src="https://malsup.github.io/jquery.blockUI.js"></script>';
		 
		  // echo '<script> $.unblockUI(); </script>';
		
		
	$this->registerJs( "
	   
	  swal.fire({
			text: 'Registro guardado',
			type: 'success',
			confirmButtonText: 'Salir',
		});
		
			// // Swal.fire({title: 'Registro guardado', type: 'success', showCancelButton: false}).then(result => {
		  // // if (result.value) {
			// // location.reload();
			// result.value will contain `true` or the input value
		  // // } else {
			// handle dismissals
			// result.dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
		  // // }
			// })
	
		
	");
}
?>
	

<div class="terceros-index">


		<!-- Nav tabs -->
	<ul class="nav nav-tabs">
	  <li class="nav-item active">
		<a class="nav-link active" data-toggle="tab" href="#tercero">Información del tercero</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#sucursal">Sucursales</a>
	  </li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
	  <div class="tab-pane container active" id="tercero">
			<?= $this->context->actionCreate();   ?>
	  </div>
	  <div class="tab-pane container fade" id="sucursal">
	 <?= $this->context->actionCreateSucursal();   ?>
	  </div>
	</div>


</div>
