<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
			
	if (!isset($_SESSION["usuario"]) )
	{
			echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => [
					 ['label' => 'Login', 'url' => ['/tbempresas/create']]
			],
		]);
	}
	else
	{
			echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => [
				['label' => 'Estado del Vehículo', 'url' => ['/vehiculos/vehiculo']],
				['label' => 'Terceros', 'url' => ['/terceros/index']],
				['label' => 'Contratos', 'url' => ['/tbcontratos/create']], 
				['label' => 'Extracto Contratos', 'url' => ['/tbextractos/create']],
				['label' => 'Salir', 'url' => ['/login/logout']],
				
				
			],
		]);
	}
    
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">Software  i-CONTROL TRANS - &copy; <a href="http://hyssolucionestecnologicas.com/">H&S Soluciones Tecnológicas <?= date('Y') ?></a></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
