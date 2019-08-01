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


		<!-- Nav tabs -->
	<ul class="nav nav-tabs">
	  <li class="nav-item">
		<a class="nav-link active" data-toggle="tab" href="#tercero">Información del tercero</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#sucursal">Sucursales</a>
	  </li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
	  <div class="tab-pane container active" id="tercero">
			<?= Yii::$app->view->renderFile('@app/views/terceros/create.php'); ?>
	  </div>
	  <div class="tab-pane container fade" id="sucursal">...</div>
	</div>


</div>
