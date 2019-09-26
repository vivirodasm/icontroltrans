<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbextractos */

$this->title = 'Crear extracto';
$this->params['breadcrumbs'][] = ['label' => 'Tbextractos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbextractos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'rutas' => $rutas,
		'departamentos' => $departamentos,
		'vehiculos' => $vehiculos,
		'variosDestinos' => $variosDestinos,
    ]) ?>

</div>
