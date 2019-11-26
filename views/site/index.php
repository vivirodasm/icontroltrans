<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'i-CONTROL TRANS';

if (isset($_SESSION["usuario"])) {
	$this->registerJs( "
	  swal.fire({
		  title: 'Importante',
		  text: 'Consulte el estado del vehículo',
		  type: 'warning',
		  confirmButtonText: 'Consultar!',
		  cancelButtonText: 'Cancelar',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33'
		  
		}).then((result) => {
  if (result.value) {
    window.location=\"index.php?r=vehiculos%2Fvehiculo\";
  }
})
	
	");
}

?>
<div class="site-index">

    <div class="jumbotron">
       
		
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <?php echo Html::img('@web/images/logo.png', ['width' => '400px', 'height' => '300px']) ?>
            </div>
            <div class="col-lg-4">
            </div>
        </div>

    </div>
</div>
