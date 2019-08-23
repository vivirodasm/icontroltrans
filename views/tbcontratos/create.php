<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbcontratos */

$this->title = 'Crear Contratos';
$this->params['breadcrumbs'][] = ['label' => 'Contratos ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbcontratos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'estado' => $estado,
		'tipoContrato' => $tipoContrato,
    ]) ?>

</div>
