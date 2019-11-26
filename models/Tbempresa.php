<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbempresa".
 *
 * @property int $IdEmpresa
 * @property string $Nombre
 * @property string $Dirección
 * @property string $Telefono
 * @property string $movil
 * @property int $Ciudad
 * @property string $email
 * @property string $web
 * @property string $codDirTerritorial
 * @property string $nroResolucionEmp
 * @property string $fechaHab
 * @property string $RNT
 * @property string $Foto
 * @property string $RLEmpresa
 * @property string $NitEmpresa
 * @property string $Regimen
 * @property string $Lema
 * @property string $rutaCarpDocHV
 * @property string $rutaCarpDocVEH
 * @property string $rutaCarpDocTER
 * @property string $rutaCarpPlantillas
 * @property string $rutaCarpSGC
 * @property string $rutaCarpPQR
 * @property string $rutaCarpExportar
 * @property string $TipoFUEC
 * @property string $TipoContrato
 * @property string $TipoConvenio
 * @property int $logoISO
 * @property string $sistContable
 * @property int $consecutivoFUEC
 * @property string $porcentajeFUEC
 * @property string $contabilidadFUEC
 * @property int $consecutivoCotiz
 * @property int $consecutivoPServ
 * @property int $consecutivoPQRF
 * @property int $consecutivoSalidaInv
 * @property string $autoICA
 * @property string $tarifaServ
 * @property string $habeasData
 * @property string $textoCotiz
 * @property string $jefeRod
 * @property string $cargoCot
 * @property string $jefeMant
 * @property string $cargoMant
 * @property string $notaFijaFV
 * @property int $verNotaFija
 * @property int $Aud_UsuarioEdit
 * @property string $Aud_FechaEdit
 *
 * @property Tbcuentasemp[] $tbcuentasemps
 * @property Tbpoblaciones $ciudad
 * @property Tbempresafacturacion[] $tbempresafacturacions
 * @property Tbgrupofuec[] $tbgrupofuecs
 * @property Tbresolucionesdian[] $tbresolucionesdians
 * @property Terceros[] $terceros
 */
class Tbempresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbempresa';
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
            [['Nombre', 'Dirección', 'Telefono', 'movil', 'Ciudad', 'email', 'codDirTerritorial', 'nroResolucionEmp', 'fechaHab', 'Foto', 'RLEmpresa', 'NitEmpresa', 'Regimen', 'Lema', 'rutaCarpDocHV', 'rutaCarpDocVEH', 'rutaCarpDocTER', 'rutaCarpPlantillas', 'rutaCarpSGC', 'rutaCarpPQR', 'rutaCarpExportar', 'TipoFUEC', 'TipoContrato', 'TipoConvenio', 'consecutivoFUEC', 'porcentajeFUEC', 'contabilidadFUEC', 'consecutivoCotiz', 'consecutivoPServ', 'consecutivoPQRF', 'consecutivoSalidaInv', 'tarifaServ', 'textoCotiz'], 'required'],
            [['Ciudad', 'logoISO', 'consecutivoFUEC', 'consecutivoCotiz', 'consecutivoPServ', 'consecutivoPQRF', 'consecutivoSalidaInv', 'verNotaFija', 'Aud_UsuarioEdit'], 'integer'],
            [['fechaHab', 'Aud_FechaEdit'], 'safe'],
            [['porcentajeFUEC', 'contabilidadFUEC'], 'number'],
            [['habeasData', 'textoCotiz'], 'string'],
            [['Nombre', 'Telefono', 'movil', 'RLEmpresa', 'NitEmpresa'], 'string', 'max' => 50],
            [['Dirección', 'email', 'web', 'Regimen', 'Lema'], 'string', 'max' => 100],
            [['codDirTerritorial'], 'string', 'max' => 3],
            [['nroResolucionEmp'], 'string', 'max' => 4],
            [['RNT'], 'string', 'max' => 10],
            [['Foto', 'rutaCarpDocHV', 'rutaCarpDocVEH', 'rutaCarpDocTER', 'rutaCarpPlantillas', 'rutaCarpSGC', 'rutaCarpPQR', 'rutaCarpExportar', 'TipoFUEC', 'TipoContrato', 'TipoConvenio'], 'string', 'max' => 255],
            [['sistContable'], 'string', 'max' => 45],
            [['autoICA', 'jefeRod', 'cargoCot', 'jefeMant', 'cargoMant'], 'string', 'max' => 80],
            [['tarifaServ'], 'string', 'max' => 15],
            [['notaFijaFV'], 'string', 'max' => 200],
            [['Ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => Tbpoblaciones::className(), 'targetAttribute' => ['Ciudad' => 'idCenPob']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdEmpresa' => 'Id Empresa',
            'Nombre' => 'Nombre',
            'Dirección' => 'Dirección',
            'Telefono' => 'Telefono',
            'movil' => 'Movil',
            'Ciudad' => 'Ciudad',
            'email' => 'Email',
            'web' => 'Web',
            'codDirTerritorial' => 'Cod Dir Territorial',
            'nroResolucionEmp' => 'Nro Resolucion Emp',
            'fechaHab' => 'Fecha Hab',
            'RNT' => 'Rnt',
            'Foto' => 'Foto',
            'RLEmpresa' => 'Rl Empresa',
            'NitEmpresa' => 'Nit Empresa',
            'Regimen' => 'Regimen',
            'Lema' => 'Lema',
            'rutaCarpDocHV' => 'Ruta Carp Doc Hv',
            'rutaCarpDocVEH' => 'Ruta Carp Doc Veh',
            'rutaCarpDocTER' => 'Ruta Carp Doc Ter',
            'rutaCarpPlantillas' => 'Ruta Carp Plantillas',
            'rutaCarpSGC' => 'Ruta Carp Sgc',
            'rutaCarpPQR' => 'Ruta Carp Pqr',
            'rutaCarpExportar' => 'Ruta Carp Exportar',
            'TipoFUEC' => 'Tipo Fuec',
            'TipoContrato' => 'Tipo Contrato',
            'TipoConvenio' => 'Tipo Convenio',
            'logoISO' => 'Logo Iso',
            'sistContable' => 'Sist Contable',
            'consecutivoFUEC' => 'Consecutivo Fuec',
            'porcentajeFUEC' => 'Porcentaje Fuec',
            'contabilidadFUEC' => 'Contabilidad Fuec',
            'consecutivoCotiz' => 'Consecutivo Cotiz',
            'consecutivoPServ' => 'Consecutivo P Serv',
            'consecutivoPQRF' => 'Consecutivo Pqrf',
            'consecutivoSalidaInv' => 'Consecutivo Salida Inv',
            'autoICA' => 'Auto Ica',
            'tarifaServ' => 'Tarifa Serv',
            'habeasData' => 'Habeas Data',
            'textoCotiz' => 'Texto Cotiz',
            'jefeRod' => 'Jefe Rod',
            'cargoCot' => 'Cargo Cot',
            'jefeMant' => 'Jefe Mant',
            'cargoMant' => 'Cargo Mant',
            'notaFijaFV' => 'Nota Fija Fv',
            'verNotaFija' => 'Ver Nota Fija',
            'Aud_UsuarioEdit' => 'Aud Usuario Edit',
            'Aud_FechaEdit' => 'Aud Fecha Edit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbcuentasemps()
    {
        return $this->hasMany(Tbcuentasemp::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudad()
    {
        return $this->hasOne(Tbpoblaciones::className(), ['idCenPob' => 'Ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbempresafacturacions()
    {
        return $this->hasMany(Tbempresafacturacion::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbgrupofuecs()
    {
        return $this->hasMany(Tbgrupofuec::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbresolucionesdians()
    {
        return $this->hasMany(Tbresolucionesdian::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerceros()
    {
        return $this->hasMany(Terceros::className(), ['IdEmpresa' => 'IdEmpresa']);
    }
}
