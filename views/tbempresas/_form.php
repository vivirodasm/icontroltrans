<?php

use yii\helpers\Html;

use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tbempresas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbempresas-form">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
		 'action' =>['tbempresas/autenticar-empresa','nit'=>$model->nit]
    ]); ?>

    <?= $form->field($model, 'nit')->textInput() ?>

 

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
