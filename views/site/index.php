<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Icontroltrans';

if (isset($_SESSION["usuario"])) {
	$this->registerJs( "
	  swal.fire({
		  title: 'Importante',
		  text: 'Verifique el estado del vehículo',
		  type: 'warning',
		  
		});
	
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
