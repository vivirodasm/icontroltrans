<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nex\chosen\Chosen;
/* @var $this yii\web\View */
/* @var $model app\models\Tbextractos */
/* @var $form yii\widgets\ActiveForm */


$this->registerJsFile(Yii::$app->request->baseUrl.'/js/extractos.js',['depends' => [\yii\web\JqueryAsset::className()]]);
//no funciona en el archivo externos contratos.js

//se valida la presion del boton "enter" para hacer la busqueda de los terceros
$this->registerJs( "

	$( document ).ready(function() 
	{
		//informacion de tercero
		$('#tbextractos_idtercero_chosen').on( 'keydown', function(event) {
				if(event.which == 13)
				{
					var info ='';
					filtro = $(this).children('div').children().children().val();
					$.get( 'index.php?r=tbcontratos/info-tercero&filtro='+filtro,
					function( data )
					{
						$.each(data, function( index, datos) 
							{	
								info = info + '<option value='+index+'>'+datos+'</option>';
								
							});
							
						select = $('#tbextractos-idtercero');	
						select.html('');
						select.trigger('chosen:updated');
						
						select.append(info);
						select.trigger('chosen:updated');
						
						
					},'json'
						);
				}
		});
		
		
		//informacion del contrato
		$('#tbextractos_nrocontrato_chosen').on( 'keydown', function(event) {
				if(event.which == 13)
				{
					var info ='';
					filtro = $(this).children('div').children().children().val();
					$.get( 'index.php?r=tbextractos/contratos&nroContrato='+filtro,
					function( data )
					{
						$.each(data, function( index, datos) 
							{	
								info = info + '<option value='+index+'>'+datos+'</option>';
								
							});
							
						select = $('#tbextractos-nrocontrato');	
						select.html('');
						select.trigger('chosen:updated');
						
						select.append(info);
						select.trigger('chosen:updated');
						
						
					},'json'
						);
				}
		});
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	});
		
");


?>



<div class="tbextractos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FUEC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anioExtracto')->textInput() ?>

    <?= $form->field($model, 'idExtracto')->textInput() ?>

    <?= $form->field($model, 'antFUEC')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, "idtercero")->widget(
						Chosen::className(), [
							'items' => [""=>""],
							'disableSearch' => 0, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione un tercero',
							'noResultsText' => "Enter para buscar",
					])?>
	

    <?= $form->field($model, 'fechaExtracto')->textInput() ?>

    <?= $form->field($model, 'resp_Contrato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedResp_Contrato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dirResp_Contrato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telResp_Contrato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'convenioEmp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaVtoConvenio')->textInput() ?>
	
	<?= $form->field($model, "nroContrato")->widget(
						Chosen::className(), [
							'items' => [],
							'disableSearch' => 0, 
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione un contrato',
							'noResultsText' => "Enter para buscar",
					])?>
	

    <?= $form->field($model, 'anioContrato')->textInput(["readOnly"=>"","value" => date("Y")]) ?>

    <?= $form->field($model, 'fechaInicio')->textInput() ?>

    <?= $form->field($model, 'fechaFin')->textInput() ?>
	
	
	<label> Departamento origen</label>
			<?= Chosen::widget([
			'name' => 'departamentoCiudadOrigen',
			'items' => $departamentos,
			'allowDeselect' => false,
			'disableSearch' => false, // Search input will be disabled
			'clientOptions' => [
				'search_contains' => true,
				'max_selected_options' => 1,
			],
			'placeholder' => 'Seleccione un Departamento',
		]);?>

    <?= $form->field($model, 'ciudadOrigen')->textInput() ?>


<label> Departamento Destino</label>
			<?= Chosen::widget([
			'name' => 'departamentoCiudadDestino',
			'items' => $departamentos,
			'allowDeselect' => false,
			'disableSearch' => false, // Search input will be disabled
			'clientOptions' => [
				'search_contains' => true,
				'max_selected_options' => 1,
			],
			'placeholder' => 'Seleccione un Departamento',
		]);?>
		
		
		
    <?= $form->field($model, 'ciudadDestino')->textInput() ?>

    <?= $form->field($model, 'destinosVarios')->textInput() ?>

    <?= $form->field($model, 'idDestino')->textInput() ?>

    <?= $form->field($model, 'descripDestino')->textarea(['rows' => 6]) ?>
	
	
	<?= $form->field($model, "idRuta")->widget(
						Chosen::className(), [
							'items' => $rutas,
							'disableSearch' => 0, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione una ruta',
							'noResultsText' => "No se encontraron resultados",
					])?>
	

    <?= $form->field($model, 'descripRuta')->textarea(['rows' => 6]) ?>

	
	
	<?= $form->field($model, "idvehiculo")->widget(
						Chosen::className(), [
							'items' => $vehiculos,
							'disableSearch' => 0, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione un vehiculo',
							'noResultsText' => "No se encontraron resultados",
					])?>
	

    <?= $form->field($model, 'vehVtoTO')->textInput() ?>

    <?= $form->field($model, 'vehVtoExtintor')->textInput() ?>

    <?= $form->field($model, 'vehVtoCDA')->textInput() ?>

    <?= $form->field($model, 'vehVtoSOAT')->textInput() ?>

    <?= $form->field($model, 'vehVtoRCC')->textInput() ?>

    <?= $form->field($model, 'vehVtoRCE')->textInput() ?>

    <?= $form->field($model, 'vehVtoBimestral')->textInput() ?>

    <?= $form->field($model, 'vlrServicio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vlrFUEC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vlrCONTBFUEC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vlrRecibido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rboFUEC')->textInput() ?>

    <?= $form->field($model, 'tipoContrato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notaExtracto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'validoPDF')->textInput() ?>

    <?= $form->field($model, 'membreteEmp')->textInput() ?>

    <?= $form->field($model, 'anuladoFUEC')->textInput() ?>

    <?= $form->field($model, 'facturado')->textInput() ?>

    <?= $form->field($model, 'GrupoFUEC')->textInput() ?>

    <?= $form->field($model, 'Aud_Usuario')->textInput() ?>

    <?= $form->field($model, 'Aud_Fecha')->textInput() ?>

    <?= $form->field($model, 'Aud_UsuarioEdit')->textInput() ?>

    <?= $form->field($model, 'Aud_FechaEdit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
