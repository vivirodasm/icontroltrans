<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbempresas */

$this->title = 'Nit';
$this->params['breadcrumbs'][] = ['label' => 'Login', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbempresas-create">

    <h2><?= Html::encode('Por favor ingrese el Nit') ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<div id="login">

</div>
