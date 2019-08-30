<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbdetacontratosveh */

$this->title = '';
// $this->params['breadcrumbs'][] = ['label' => 'Tbdetacontratosvehs', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbdetacontratosveh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'form'  => $form,
		'placa' => $placa,
		'num'=> $num,
    ]) ?>

</div>
