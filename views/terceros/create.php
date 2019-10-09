<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Terceros */

$this->title = 'Crear Tercero';
$this->params['breadcrumbs'][] = ['label' => 'Terceros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="terceros-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
		'model' 			=> $model,
		'empresa'			=> $empresa,
		'naturalezTercero' 	=> $naturalezTercero,
		'paises'			=> $paises,
		'sociedades'		=> $sociedades,
		'identidades' 		=> $identidades,
		'estado'			=> $estado,
		'tipoTercero'		=> $tipoTercero,
		'departamentos'		=> $departamentos,
    ]) ?>

</div>
