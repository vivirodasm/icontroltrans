<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nex\chosen\Chosen;
use dosamigos\datepicker\DatePicker;
	
/* @var $this yii\web\View */
/* @var $model app\models\Tbcontratos */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/contratos.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<div class="tbcontratos-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, "idtercero")->widget(
						Chosen::className(), [
							'items' => $Idtercero,
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione un tercero',
					])?>
	
	<?= $form->field($model, "sucursalActiva")->widget(
						Chosen::className(), [
							'items' => [],
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione una sucursal',
							
					])?>

    <?= $form->field($model, 'sucursalTercero')->checkbox(['maxlength' => true]) ?>
	
	<?= $form->field($model, "tipoContrato")->widget(
						Chosen::className(), [
							'items' => $tipoContrato,
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione un tipo de contrato',
					])?>

   <?= $form->field($model, 'fechaInicio')->widget(
			DatePicker::className(), [
			'template' 		=> '{addon}{input}',
			'language' 		=> 'es',
			'clientOptions' => [
				'autoclose' 	=> true,
				'format' 		=> 'yyyy-mm-dd'
			],
		]);  
	?>
	
	<?= $form->field($model, 'fechaFin')->widget(
				DatePicker::className(), [
				'template' 		=> '{addon}{input}',
				'language' 		=> 'es',
				'clientOptions' => [
					'autoclose' 	=> true,
					'format' 		=> 'yyyy-mm-dd'
				],
			]);  
		?>

<label>Días</label>
<?= Html::input('text','dias','', $options=["disabled"=>true,"id"=>"dias"]) ?>

	<?= $form->field($model, "ciudadOrigen")->widget(
		Chosen::className(), [
			'items' => [],
			'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
			'multiple' => false,
			'clientOptions' => [
				'search_contains' => true,
				'single_backstroke_delete' => false,
			],
			'placeholder' => 'Seleccione algunos grupos',
	])?>

	<?= $form->field($model, "ciudadDestino")->widget(
		Chosen::className(), [
			'items' => [],
			'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
			'multiple' => false,
			'clientOptions' => [
				'search_contains' => true,
				'single_backstroke_delete' => false,
			],
			'placeholder' => 'Seleccione algunos grupos',
	])?>
	
    <?= $form->field($model, 'objetCont')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cantVeh')->textInput(["type"=>"number"]) ?>

    <?= $form->field($model, 'nroPsj')->textInput(["type"=>"number"]) ?>

    <?= $form->field($model, 'vlrContrato')->textInput(["type"=>"number"]) ?>
	
	<?= $form->field($model, "estado")->widget(
						Chosen::className(), [
							'items' => $estado,
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione algunos grupos',
					])?>

    <?= $form->field($model, 'aliasContrato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notasContrato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resp_Contrato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedResp_Contrato')->textInput(['maxlength' => true ,"type"=>"number"]) ?>

    <?= $form->field($model, 'dirResp_Contrato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telResp_Contrato')->textInput(['maxlength' => true ,"type"=>"number"]) ?>

    <?= $form->field($model, 'Aud_Usuario')->textInput() ?>

    <?= $form->field($model, 'Aud_Fecha')->textInput() ?>

    <?= $form->field($model, 'Aud_UsuarioEdit')->textInput() ?>

    <?= $form->field($model, 'Aud_FechaEdit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
