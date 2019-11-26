<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Login */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Empresa: ' .$_SESSION["nombre"];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Ingrese los siguientes campos para iniciar sesión:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-xs-2 control-label'],
        ],
		'action' =>['login/login']
    ]); ?>
	
		<div class="row">
		  <div class="col-md-2"></div>
		  <div class="col-md-10"> 
				<?= $form->field($model, 'username')->textInput(['autofocus' => true, 'required' => true])->label('Usuario') ?>

				<?= $form->field($model, 'password')->passwordInput(['required' => true])->label('Contraseña') ?>

				<div class="form-group">
					<div class="col-lg-offset-1 col-lg-11">
						<?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
					</div>
				</div></div>
		  <div class="col-md-2"></div>
		</div>

       

    <?php ActiveForm::end(); ?>

    <?php  

if (@$mensaje == 1) {
	$this->registerJs( "
	  swal.fire({
			title: 'Usuario no encontrado',
			text: ' Verifique los datos ingresados',
			type: 'error',
			confirmButtonText: 'Salir',
		});
	
	");
}

?>
</div>
