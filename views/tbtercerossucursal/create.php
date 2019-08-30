<?php

use yii\helpers\Html;
use app\models\Tbpoblaciones;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Tbtercerossucursal */

$this->title = 'Crear Sucursal';
$this->params['breadcrumbs'][] = ['label' => 'sucursal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tbtercerossucursal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'Idtercero' => $Idtercero,
		'departamento'=> $departamento,
    ]) ?>

</div>
