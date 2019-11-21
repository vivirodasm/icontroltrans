<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehiculos".
 *
 * @property string $placa
 * @property string $NroInterno
 * @property string $fechaAfil
 * @property string $fechaDesafil
 * @property string $estado
 * @property string $emprAfil
 * @property string $fechaVtoConvenio
 * @property string $relacion
 * @property string $nroContrAfil
 * @property string $fechaVtoContAfil
 * @property string $clase
 * @property string $claseTarifaFUEC
 * @property string $marca
 * @property int $modelo
 * @property string $combustible
 * @property string $tipoTransporte
 * @property int $vehEmpresa
 * @property string $rutaVeh
 * @property string $propietario
 * @property string $observaciones
 * @property int $vehBloqueado
 * @property string $nroMatricula
 * @property string $orgTransito
 * @property string $fechaExpMatric
 * @property string $linea
 * @property string $cilindraje
 * @property int $capacPjs
 * @property string $color
 * @property string $motor
 * @property string $chasis
 * @property string $nroTarjOper
 * @property string $fechaExpTO
 * @property string $fechaVtoTO
 * @property string $nombreCDA
 * @property string $nroCertCDA
 * @property string $fechaVtoExtintor
 * @property string $fechaExpCDA
 * @property string $fechaVtoCDA
 * @property string $aseguradoraSOAT
 * @property string $nroSOAT
 * @property string $fechaExpSOAT
 * @property string $fechaVtoSOAT
 * @property string $aseguradoraRCC
 * @property string $nroRCC
 * @property string $fechaExpRCC
 * @property string $fechaVtoRCC
 * @property string $aseguradoraRCE
 * @property string $nroRCE
 * @property string $fechaExpRCE
 * @property string $fechaVtoRCE
 * @property int $carct_TV
 * @property int $carct_sonido
 * @property int $carct_banio
 * @property int $carct_sillaReclin
 * @property int $carct_aireAcond
 * @property int $carct_microf
 * @property int $carct_GPS
 * @property int $carct_Calefac
 * @property int $carct_portaEquip
 * @property int $carct_cinturSeg
 * @property int $carct_salidEmerg
 * @property int $carct_martillFrag
 * @property int $carct_luzIntNeon
 * @property int $carct_luzIndSilla
 * @property int $carct_cortinas
 * @property string $rutaImgVeh
 * @property string $rutaMatricula1
 * @property string $rutaMatricula2
 * @property string $rutaTOperacion1
 * @property string $rutaTOperacion2
 * @property string $rutaCDA
 * @property string $rutaSoat
 * @property string $rutaRCC
 * @property string $rutaRCE
 * @property int $Aud_Usuario
 * @property string $Aud_Fecha
 * @property int $Aud_UsuarioEdit
 * @property string $Aud_FechaEdit
 *
 * @property Tbconvenios[] $tbconvenios
 * @property Tbdetaconductores[] $tbdetaconductores
 * @property Tbdetaconsolservicio[] $tbdetaconsolservicios
 * @property Tbdetaconsolserviciomk[] $tbdetaconsolserviciomks
 * @property Tbdetacontratosveh[] $tbdetacontratosvehs
 * @property Tbdetaprogservicio[] $tbdetaprogservicios
 * @property Tbdetaprogserviciomk[] $tbdetaprogserviciomks
 * @property Tbdetasalidasinventario[] $tbdetasalidasinventarios
 * @property Tbevalprovservtransp[] $tbevalprovservtransps
 * @property Tbextractos[] $tbextractos
 * @property Tbgrupofuec[] $tbgrupofuecs
 * @property Tbinvestigaciones[] $tbinvestigaciones
 * @property Tbmantenimientos[] $tbmantenimientos
 * @property Tbordencompra[] $tbordencompras
 * @property Tbpalistamiento[] $tbpalistamientos
 * @property Tbquejasreclamos[] $tbquejasreclamos
 * @property Tbrpbimestral[] $tbrpbimestrals
 * @property Tbviajesotorgados[] $tbviajesotorgados
 * @property Tbusuarios $audUsuario
 * @property Terceros $propietario0
 */
class Vehiculos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehiculos';
    }
	
	/**
     * {@inheritdoc}
	 * Conexion a la base de datos correspondiente
     */
	public static function getDb() 
	{
		
			return Yii::$app->get($_SESSION['db']);
		
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['placa', 'estado', 'Aud_Usuario', 'Aud_Fecha'], 'required'],
            [['fechaAfil', 'fechaDesafil', 'fechaVtoConvenio', 'fechaVtoContAfil', 'fechaExpMatric', 'fechaExpTO', 'fechaVtoTO', 'fechaVtoExtintor', 'fechaExpCDA', 'fechaVtoCDA', 'fechaExpSOAT', 'fechaVtoSOAT', 'fechaExpRCC', 'fechaVtoRCC', 'fechaExpRCE', 'fechaVtoRCE', 'Aud_Fecha', 'Aud_FechaEdit'], 'safe'],
            [['modelo', 'vehEmpresa', 'vehBloqueado', 'capacPjs', 'carct_TV', 'carct_sonido', 'carct_banio', 'carct_sillaReclin', 'carct_aireAcond', 'carct_microf', 'carct_GPS', 'carct_Calefac', 'carct_portaEquip', 'carct_cinturSeg', 'carct_salidEmerg', 'carct_martillFrag', 'carct_luzIntNeon', 'carct_luzIndSilla', 'carct_cortinas', 'Aud_Usuario', 'Aud_UsuarioEdit'], 'integer'],
            [['placa', 'nroContrAfil'], 'string', 'max' => 50],
            [['NroInterno'], 'string', 'max' => 10],
            [['estado'], 'string', 'max' => 20],
            [['emprAfil', 'relacion'], 'string', 'max' => 100],
            [['clase', 'claseTarifaFUEC', 'marca', 'combustible', 'tipoTransporte', 'rutaVeh', 'nroMatricula', 'orgTransito', 'linea', 'cilindraje', 'color', 'motor', 'chasis', 'nroTarjOper', 'nombreCDA', 'nroCertCDA', 'aseguradoraSOAT', 'nroSOAT', 'aseguradoraRCC', 'nroRCC', 'aseguradoraRCE', 'nroRCE'], 'string', 'max' => 80],
            [['propietario'], 'string', 'max' => 15],
            [['observaciones', 'rutaImgVeh', 'rutaMatricula1', 'rutaMatricula2', 'rutaTOperacion1', 'rutaTOperacion2', 'rutaCDA', 'rutaSoat', 'rutaRCC', 'rutaRCE'], 'string', 'max' => 255],
            [['placa'], 'unique'],
            [['Aud_Usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Tbusuarios::className(), 'targetAttribute' => ['Aud_Usuario' => 'IdUsuario']],
            [['propietario'], 'exist', 'skipOnError' => true, 'targetClass' => Terceros::className(), 'targetAttribute' => ['propietario' => 'idtercero']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'placa' => 'PLACA',
            'NroInterno' => 'LATERAL',
            'fechaAfil' => 'AFILIACIÓN',
            'fechaDesafil' => 'Fecha Desafil',
            'estado' => 'Estado',
            'emprAfil' => 'Empr Afil',
            'fechaVtoConvenio' => 'CONVENIO',
            'relacion' => 'Relacion',
            'nroContrAfil' => 'Nro Contr Afil',
            'fechaVtoContAfil' => 'CONTRATO',
            'clase' => 'Clase',
            'claseTarifaFUEC' => 'Clase Tarifa Fuec',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'combustible' => 'Combustible',
            'tipoTransporte' => 'Tipo Transporte',
            'vehEmpresa' => 'Veh Empresa',
            'rutaVeh' => 'Ruta Veh',
            'propietario' => 'Propietario',
            'observaciones' => 'Observaciones',
            'vehBloqueado' => 'Veh Bloqueado',
            'nroMatricula' => 'Nro Matricula',
            'orgTransito' => 'Org Transito',
            'fechaExpMatric' => 'Fecha Exp Matric',
            'linea' => 'Linea',
            'cilindraje' => 'Cilindraje',
            'capacPjs' => 'Capac Pjs',
            'color' => 'Color',
            'motor' => 'Motor',
            'chasis' => 'Chasis',
            'nroTarjOper' => 'Nro Tarj Oper',
            'fechaExpTO' => 'Fecha Exp To',
            'fechaVtoTO' => 'OPERACIÓN',
            'nombreCDA' => 'Nombre Cda',
            'nroCertCDA' => 'Nro Cert Cda',
            'fechaVtoExtintor' => 'EXTINTOR',
            'fechaExpCDA' => 'Fecha Exp Cda',
            'fechaVtoCDA' => 'CDA',
            'aseguradoraSOAT' => 'Aseguradora Soat',
            'nroSOAT' => 'Nro Soat',
            'fechaExpSOAT' => 'Fecha Exp Soat',
            'fechaVtoSOAT' => 'SOAT',
            'aseguradoraRCC' => 'Aseguradora Rcc',
            'nroRCC' => 'Nro Rcc',
            'fechaExpRCC' => 'Fecha Exp Rcc',
            'fechaVtoRCC' => 'RCC',
            'aseguradoraRCE' => 'Aseguradora Rce',
            'nroRCE' => 'Nro Rce',
            'fechaExpRCE' => 'Fecha Exp Rce',
            'fechaVtoRCE' => 'RCE',
            'carct_TV' => 'Carct Tv',
            'carct_sonido' => 'Carct Sonido',
            'carct_banio' => 'Carct Banio',
            'carct_sillaReclin' => 'Carct Silla Reclin',
            'carct_aireAcond' => 'Carct Aire Acond',
            'carct_microf' => 'Carct Microf',
            'carct_GPS' => 'Carct Gps',
            'carct_Calefac' => 'Carct Calefac',
            'carct_portaEquip' => 'Carct Porta Equip',
            'carct_cinturSeg' => 'Carct Cintur Seg',
            'carct_salidEmerg' => 'Carct Salid Emerg',
            'carct_martillFrag' => 'Carct Martill Frag',
            'carct_luzIntNeon' => 'Carct Luz Int Neon',
            'carct_luzIndSilla' => 'Carct Luz Ind Silla',
            'carct_cortinas' => 'Carct Cortinas',
            'rutaImgVeh' => 'Ruta Img Veh',
            'rutaMatricula1' => 'Ruta Matricula1',
            'rutaMatricula2' => 'Ruta Matricula2',
            'rutaTOperacion1' => 'Ruta T Operacion1',
            'rutaTOperacion2' => 'Ruta T Operacion2',
            'rutaCDA' => 'Ruta Cda',
            'rutaSoat' => 'Ruta Soat',
            'rutaRCC' => 'Ruta Rcc',
            'rutaRCE' => 'Ruta Rce',
            'Aud_Usuario' => 'Aud Usuario',
            'Aud_Fecha' => 'Aud Fecha',
            'Aud_UsuarioEdit' => 'Aud Usuario Edit',
            'Aud_FechaEdit' => 'Aud Fecha Edit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbconvenios()
    {
        return $this->hasMany(Tbconvenios::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdetaconductores()
    {
        return $this->hasMany(Tbdetaconductores::className(), ['idVeh' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdetaconsolservicios()
    {
        return $this->hasMany(Tbdetaconsolservicio::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdetaconsolserviciomks()
    {
        return $this->hasMany(Tbdetaconsolserviciomk::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdetacontratosvehs()
    {
        return $this->hasMany(Tbdetacontratosveh::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdetaprogservicios()
    {
        return $this->hasMany(Tbdetaprogservicio::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdetaprogserviciomks()
    {
        return $this->hasMany(Tbdetaprogserviciomk::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdetasalidasinventarios()
    {
        return $this->hasMany(Tbdetasalidasinventario::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbevalprovservtransps()
    {
        return $this->hasMany(Tbevalprovservtransp::className(), ['idvehiculo' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbextractos()
    {
        return $this->hasMany(Tbextractos::className(), ['idvehiculo' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbgrupofuecs()
    {
        return $this->hasMany(Tbgrupofuec::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbinvestigaciones()
    {
        return $this->hasMany(Tbinvestigaciones::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbmantenimientos()
    {
        return $this->hasMany(Tbmantenimientos::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbordencompras()
    {
        return $this->hasMany(Tbordencompra::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbpalistamientos()
    {
        return $this->hasMany(Tbpalistamiento::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbquejasreclamos()
    {
        return $this->hasMany(Tbquejasreclamos::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbrpbimestrals()
    {
        return $this->hasMany(Tbrpbimestral::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbviajesotorgados()
    {
        return $this->hasMany(Tbviajesotorgados::className(), ['placa' => 'placa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAudUsuario()
    {
        return $this->hasOne(Tbusuarios::className(), ['IdUsuario' => 'Aud_Usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropietario0()
    {
        return $this->hasOne(Terceros::className(), ['idtercero' => 'propietario']);
    }
	
	  /**
     * @return la fecha con estilo si es menor a la actual
     */
	public function validarFechas($fecha, $documento){
		// $documento = utf8_encode($documento);
		$valores = array('fecha' =>'', 'mensaje'=>'');
		if ($fecha ){
			$fecha=strtotime($fecha) + 24*3600 ;  //2020-10-08 00:00:00.000000 date('r', strtotime($fecha));
			
			$fechaActual=time();
			if($fechaActual > $fecha){
				$fecha=date('Y-m-d',($fecha));  
				$valores['fecha']='<span class="" style="background-color:  #a93226;  color: white; border-radius: 5px;"> '.$fecha.'</span>';
				$valores['mensaje']='<span class="" style="color:  #a93226; font-size:large;"> El vencimiento de: '.$documento.' fue '.$fecha.'</span>';
			}
			else{
				$fecha=date('Y-m-d',($fecha));
				// $valores['fecha']='<span class=""> '.$fecha.'</span>';
				$valores['fecha']=$fecha;
			}
		}
		else {$valores['fecha']= "Sin datos";}
		
		 // print_r($valores); 
        return $valores;
    }
	
	function codificarEnUtf8($fila) {
        $aux;
        foreach ($fila as $value) {
            $aux[] = utf8_encode($value);
        }
        return $aux;
    }
}
