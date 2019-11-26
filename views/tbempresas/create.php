<?php

use yii\helpers\Html;

use yii\bootstrap\ActiveForm;



/* @var $this yii\web\View */
/* @var $model app\models\Tbempresas */

$this->title = 'Nit';
$this->params['breadcrumbs'][] = ['label' => 'Login', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbempresas-create">

    <div class="tbempresas-form" id="tbempresas-form" style="display:'' ">
	
	<h2><?= Html::encode('Por favor ingrese el Nit de la Empresa') ?></h2>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
       
        
		 'action' =>['tbempresas/create','nit'=>$model->nit]
    ]); ?>
	
	<div class="row">
		  <div class="col-md-2"></div>
		  <div class="col-md-2">
			<?= $form->field($model, 'nit')->textInput() ?>
		  </div>
		  <div class="col-md-4"><br> <?= Html::submitButton('Conectar', ['class' => 'btn btn-success']) ?></div>
	 
	</div>
    

 

    

    <?php ActiveForm::end(); ?>

</div>


</div>

<div id="login">
<?php  
if (@$validarEmpresa == 2){
	echo $this->context->actionLogin();
	$this->registerJs( "
	  $('#tbempresas-form').hide();
	
	");
}
elseif (@$validarEmpresa == 1) {
	$this->registerJs( "
	  swal.fire({
			title: 'Empresa no encontrada',
			type: 'error',
			confirmButtonText: 'Salir',
		});
	
	");
}

?>
   

</div>
