<style type="text/css">
#contenedor {
    display: table;
    border: 2px solid #000;
    width: 870px;
    text-align: center;
    margin: 0 auto;
}
#contenidos {
    display: table-row;
}
#columna1, #columna2, #columna3, #columna4, #columna5, #columna6, #columna7 {
    display: table-cell;
    border: 1px solid #000;
    vertical-align: middle;
    padding: 10px;
}
</style>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nex\chosen\Chosen;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Tbextractos */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/extractos.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("@web/css/extractos.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);



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
		
		
		//informacion de fuec anterior
		$('#tbextractos-antfuec').on( 'keydown', function(event) {
				if(event.which == 13)
				{
					
					fuecAnt = $('#tbextractos-antfuec').val();
					 $.get( 'index.php?r=tbextractos/fuec-anterior&fuecAnt='+fuecAnt,
					function( data )
					{
						//contratante
						select = $('#tbextractos-idtercero');	//id del select
						select.html('');
						select.html('<option value='+data['idtercero']+'>'+data['nombrecompleto']+'</option>');	
						select.val(data['idtercero']);
						select.trigger('chosen:updated');
						$('#docTercero').val(data['idtercero']);	
						
						//responsable
						$('#tbextractos-resp_contrato').val(data['resp_Contrato']);	
						$('#tbextractos-cedresp_contrato').val(data['cedResp_Contrato']);	
						$('#tbextractos-dirresp_contrato').val(data['dirResp_Contrato']);	
						$('#tbextractos-telresp_contrato').val(data['telResp_Contrato']);

						//ciudad origen - ciudad destino
						//ciudad origen contrato 
						obj = $('#tbextractos-ciudadorigen');
						poblaciones(data.idciudadOrigen,obj);
						
						//ciudad origen contrato 
						obj = $('#tbextractos-ciudaddestino');
						poblaciones(data.idciudadDestino,obj);
						
						//descripcion ruta
						$('#tbextractos-descripruta').val(data['descripRuta']);
						
						
					},'json'
						);
				}
		});

		
	});
		
");

$nombreEmpresa = $_SESSION['nombre'];





?>

<script type="text/javascript">
var nombreEmpresa = "<?php echo $nombreEmpresa;?>";
</script>



<div class="tbextractos-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="row">
	  <div class="col-md-2"> <?= $form->field($model, 'fechaExtracto')->textInput(["value"=>date("Y-m-d"),"readOnly"=>true]) ?></div>
	  <div class="col-md-3"><label>Empresa</label><br>
	<?= Html::input('text','',$_SESSION['nombre'], $options=['id'=> 'nomEmpresa', "disabled"=>"" ]) ?></div>
	 <div class="col-md-2"> <?= $form->field($model, 'anioContrato')->hiddenInput()->label(false) ?></div>
	</div>
	
	
	<div class="row">
	  
	  <div class="col-md-3"><?= $form->field($model, 'antFUEC')->textInput(['maxlength' => true]) ?></div>
	  <div class="col-md-2"><label>Clase vehículo</label>
		<?= Html::input('text','','', $options=['id'=> 'claseVehiculo', "disabled"=>"" ]) ?></div>
	  <div class="col-md-2"><?= $form->field($model, 'convenioEmp')->textInput(['maxlength' => true,"readOnly"=>true]) ?></div>
	  <div class="col-md-2"><?= $form->field($model, 'fechaVtoConvenio')->textInput(["readOnly"=>true]) ?></div>
	  <div class="col-md-2"><?= $form->field($model, 'anioExtracto')->hiddenInput()->label(false) ?></div>
	</div>
	
    
	<div class="row">
	  <div class="col-md-2"><?= $form->field($model, "idvehiculo")->widget(
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
					])?></div>
	  <div class="col-md-10">
	  
		<div id="contenedor">
			<div id="contenidos">
				<div id="columna1"><?= $form->field($model, 'vehVtoTO')->textInput(["readOnly" =>""]) ?></div>
				<div id="columna2"><?= $form->field($model, 'vehVtoExtintor')->textInput(["readOnly" =>""]) ?></div>
				<div id="columna3"><?= $form->field($model, 'vehVtoCDA')->textInput(["readOnly" =>""]) ?></div>
				<div id="columna4"><?= $form->field($model, 'vehVtoSOAT')->textInput(["readOnly" =>""]) ?></div>
				<div id="columna5"><?= $form->field($model, 'vehVtoRCC')->textInput(["readOnly" =>""]) ?></div>
				<div id="columna6"><?= $form->field($model, 'vehVtoRCE')->textInput(["readOnly" =>""]) ?></div>
				<div id="columna7"><?= $form->field($model, 'vehVtoBimestral')->textInput(["readOnly" =>""]) ?></div>
			</div>
		</div>
	  
	  </div>
	 
	</div>
	
	<div class="row">
	  <div class="col-md-4"><?= $form->field($model, "idtercero")->widget(
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
					])?></div>
					
					
	
	  <div class="col-md-4">
		<label>
			  <br />
			  
		</label>
		
		<br />
		<?= Html::input('text','','', $options=['id'=> 'docTercero', "disabled"=>"" ]) ?></div>
	  <div class="col-md-2">	<?= $form->field($model, "nroContrato")->widget(
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
					])?></div>
	</div>
	
	<div class="row">
	  <div class="col-md-3"><?= $form->field($model, 'resp_Contrato')->textInput(['maxlength' => true]) ?></div>
	  <div class="col-md-2"><?= $form->field($model, 'cedResp_Contrato')->textInput(['maxlength' => true]) ?></div>
	  <div class="col-md-2"><?= $form->field($model, 'dirResp_Contrato')->textInput(['maxlength' => true]) ?></div>
	  <div class="col-md-2"><?= $form->field($model, 'telResp_Contrato')->textInput(['maxlength' => true]) ?></div>
	  <div class="col-md-3"><?= Html::button('<img src="images/tarea.png" width="20px" height="20px">', ['class' => '','id'=>"btnTercero",'title' => 'Datos igual al contratante']) ?>
	  <?= Html::button('<img src="images/carnet-de-identidad.png" width="20px" height="20px">', ['class' => '','id'=>"btnConTercero",'title' => 'Datos igual al contacto contratante']) ?></div>
	</div>
						

	<div class="row">
	  <div class="col-md-2">
	  <?= $form->field($model, 'fechaInicio')->widget(   DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
        ],
		
    ],[ "readOnly"=>true]); ?>
	  </div>
	  <div class="col-md-2">
	   <?= $form->field($model, 'fechaFin')->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
        ],
    ]); ?>
	  </div>
	  <div class="col-md-1"><label> Días</label> <br /><?= Html::input('text','','', $options=['id'=> 'diasExtractos', "disabled"=>"", "style" => "width: 40%;" ]) ?> </div>
	  <div class="col-md-2"><?= $form->field($model, 'tipoContrato')->textInput(['maxlength' => true,"readOnly"=>true]) ?></div>
	  <div class="col-md-2"><?= $form->field($model, 'destinosVarios')->checkbox() ?></div>
	</div>
   
	
	<div class="row">
	  <div class="col-md-2"><label> Departamento Origen</label>
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
		]);?></div>
	  <div class="col-md-2"> 
	  
	  
	  
	  <?= $form->field($model, "ciudadOrigen")->widget(
						Chosen::className(), [
							'items' => [],
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione una ciudad',
					])?>
	  
	  </div>
	  <div class="col-md-2">
	  <!-- select de varios destinos -->
	  <div id ="variosDestinos" style="display:none"><label> Varios destinos </label> <?= Html::dropDownList('variosDestinos', null, $variosDestinos,['prompt'=> 'Seleccione..',"id"=> "idVariosDestinos"]) ?> </div>
	  
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
		]);?></div>
		<div class="col-md-2"> 
		
		<?= $form->field($model, "ciudadDestino")->widget(
						Chosen::className(), [
							'items' => [],
							'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
							'multiple' => false,
							'clientOptions' => [
								'search_contains' => true,
								'single_backstroke_delete' => false,
							],
                            'placeholder' => 'Seleccione una ciudad',
					])?>
		</div>
		<div class="col-md-2"> <?= $form->field($model, "idRuta")->widget(
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
					])?></div>
	</div>

	 
    <div class="row">
	  <div class="col-md-12"><?= $form->field($model, 'descripDestino')->textarea(['rows' => 2]) ?></div>
	</div>
	
	<div class="row">
	  <div class="col-md-12"><?= $form->field($model, 'descripRuta')->textarea(['rows' => 2]) ?></div>
	</div>
	
	<div id="conductores">  </div>

	<div class="row">
	  <div class="col-md-12"><?= $form->field($model, 'notaExtracto')->textarea(['rows' => 2]) ?></div>
	  
	</div>

	<div class="row">
	  <div class="col-md-2"><?= $form->field($model, 'vlrServicio')->textInput(['maxlength' => true]) ?></div>
	  <div class="col-md-2"><?= $form->field($model, 'vlrCONTBFUEC')->textInput(['maxlength' => true]) ?></div>
	  <div class="col-md-3"><?= $form->field($model, 'FUEC')->textInput(['maxlength' => true]) ?></div>
	</div>
    
<!-- Este campo se incrementa de a uno, al cambiar el añio se reinicia en 1 , 4 digitos maximo, se usa para armar el # FUEC-->
  <?= $form->field($model, 'idExtracto')->hiddenInput()->label(false) ?> 
	
    <?= $form->field($model, 'idDestino')->hiddenInput()->label(false) ?>

   
    <?= $form->field($model, 'vlrFUEC')->hiddenInput()->label(false) ?>

    

    <?= $form->field($model, 'vlrRecibido')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'rboFUEC')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'validoPDF')->hiddenInput()->label(false)?>

    <?= $form->field($model, 'membreteEmp')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'anuladoFUEC')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'facturado')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'GrupoFUEC')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'Aud_Usuario')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'Aud_Fecha')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'Aud_UsuarioEdit')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'Aud_FechaEdit')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
