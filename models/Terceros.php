<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "terceros".
 *
 * @property string $idtercero
 * @property string $dv_tercero
 * @property int $IdEmpresa
 * @property string $idIdentidad
 * @property string $idSociedad
 * @property string $naturalez_tercero
 * @property string $nombre1_tercero
 * @property string $nombre2_tercero
 * @property string $apellido1_tercero
 * @property string $apellido2_tercero
 * @property string $nombrecompleto
 * @property string $nombreComercial
 * @property string $direccion_tercero
 * @property string $tel_tercero
 * @property string $movil_tercero
 * @property int $idCenPob
 * @property string $idpaises
 * @property string $contacto_tercero
 * @property string $ced_Contacto
 * @property string $dir_contacto
 * @property string $tel_contacto
 * @property string $mail_tercero
 * @property int $autData
 * @property string $tipo_tercero
 * @property string $obs_tercero
 * @property string $estado
 * @property string $rutaRut
 * @property string $rutaCedula
 * @property int $Aud_Usuario
 * @property string $Aud_Fecha
 * @property int $Aud_UsuarioEdit
 * @property string $Aud_FechaEdit
 *
 * @property Tbconsolservicio[] $tbconsolservicios
 * @property Tbcontratos[] $tbcontratos
 * @property Tbconvenios[] $tbconvenios
 * @property Tbcotizacion[] $tbcotizacions
 * @property Tbdetamantenimiento[] $tbdetamantenimientos
 * @property Tbevalprofesionales[] $tbevalprofesionales
 * @property Tbevalprovinsumos[] $tbevalprovinsumos
 * @property Tbevalprovservicios[] $tbevalprovservicios
 * @property Tbevalselectproveedores[] $tbevalselectproveedores
 * @property Tbextractos[] $tbextractos
 * @property Tbhv $tbhv
 * @property Tbordencompra[] $tbordencompras
 * @property Tbprogservicio[] $tbprogservicios
 * @property Tbquejasreclamos[] $tbquejasreclamos
 * @property Tbsalidasinventario[] $tbsalidasinventarios
 * @property Tbtercerossucursal[] $tbtercerossucursals
 * @property Tbempresa $empresa
 * @property Tbidentidades $identidad
 * @property Tbpaises $paises
 * @property Tbpoblaciones $cenPob
 * @property Tbsociedades $sociedad
 * @property Tbusuarios $audUsuario
 * @property Vehiculos[] $vehiculos
 */
class Terceros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	
    public static function tableName()
    {
        return 'terceros';
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
            [['idtercero', 'IdEmpresa', 'naturalez_tercero', 'idCenPob', 'idpaises', 'tipo_tercero', 'estado', 'Aud_Usuario', 'Aud_Fecha','idSociedad','autData'],'required'],
            [['IdEmpresa', 'idCenPob', 'autData', 'Aud_Usuario', 'Aud_UsuarioEdit'], 'integer'],
            [['Aud_Fecha', 'Aud_FechaEdit'], 'safe'],
            [['idtercero', 'idSociedad'], 'string', 'max' => 15],
            [['dv_tercero'], 'string', 'max' => 1],
            [['idIdentidad', 'naturalez_tercero', 'idpaises'], 'string', 'max' => 5],
            [['nombre1_tercero', 'nombre2_tercero', 'apellido1_tercero', 'apellido2_tercero', 'mail_tercero'], 'string', 'max' => 100],
            [['nombrecompleto', 'nombreComercial', 'direccion_tercero', 'contacto_tercero', 'dir_contacto'], 'string', 'max' => 150],
            [['tel_tercero', 'movil_tercero', 'tel_contacto'], 'string', 'max' => 50],
            [['ced_Contacto', 'estado'], 'string', 'max' => 20],
            [['tipo_tercero', 'obs_tercero'], 'string', 'max' => 80],
            [['rutaRut', 'rutaCedula'], 'string', 'max' => 255],
            [['idtercero'], 'unique'],
            [['IdEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Tbempresa::className(), 'targetAttribute' => ['IdEmpresa' => 'IdEmpresa']],
            [['idIdentidad'], 'exist', 'skipOnError' => true, 'targetClass' => Tbidentidades::className(), 'targetAttribute' => ['idIdentidad' => 'idIdentidad']],
            [['idpaises'], 'exist', 'skipOnError' => true, 'targetClass' => Tbpaises::className(), 'targetAttribute' => ['idpaises' => 'idpaises']],
            [['idCenPob'], 'exist', 'skipOnError' => true, 'targetClass' => Tbpoblaciones::className(), 'targetAttribute' => ['idCenPob' => 'idCenPob']],
            [['idSociedad'], 'exist', 'skipOnError' => true, 'targetClass' => Tbsociedades::className(), 'targetAttribute' => ['idSociedad' => 'idSociedad']],
            [['Aud_Usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Tbusuarios::className(), 'targetAttribute' => ['Aud_Usuario' => 'IdUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtercero' => 'CC/NIT',
            'dv_tercero' => 'DV',
            'IdEmpresa' => 'Empresa',
            'idIdentidad' => 'Tipo de Identificación',
            'idSociedad' => 'Tipo de Sociedad',
            'naturalez_tercero' => 'Naturaleza Jurídca',
            'nombre1_tercero' => 'Primer Nombre',
            'nombre2_tercero' => 'Segundo Nombre',
            'apellido1_tercero' => 'Primer Apellido',
            'apellido2_tercero' => 'Segundo Apellido',
            'nombrecompleto' => 'Razón Social',
            'nombreComercial' => 'Nombre Comercial',
            'direccion_tercero' => 'Dirección',
            'tel_tercero' => 'Teléfono',
            'movil_tercero' => 'Móvil',
            'idCenPob' => 'Ciudad',
            'idpaises' => 'País',
            'contacto_tercero' => 'Contacto',
            'ced_Contacto' => 'Cédula',
            'dir_contacto' => 'Dirección',
            'tel_contacto' => 'Teléfono',
            'mail_tercero' => 'E-Mail',
            'autData' => 'El tercero autoriza la política de tratamiento de datos',
            'tipo_tercero' => 'Tipo',
            'obs_tercero' => 'Observaciones',
            'estado' => 'Estado',
            'rutaRut' => 'Ruta Rut',
            'rutaCedula' => 'Ruta Cedula',
            'Aud_Usuario' => 'Aud Usuario',
            'Aud_Fecha' => 'Aud Fecha',
            'Aud_UsuarioEdit' => 'Aud Usuario Edit',
            'Aud_FechaEdit' => 'Aud Fecha Edit',
        ];

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbconsolservicios()
    {
        return $this->hasMany(Tbconsolservicio::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbcontratos()
    {
        return $this->hasMany(Tbcontratos::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbconvenios()
    {
        return $this->hasMany(Tbconvenios::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbcotizacions()
    {
        return $this->hasMany(Tbcotizacion::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdetamantenimientos()
    {
        return $this->hasMany(Tbdetamantenimiento::className(), ['idproveedor' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbevalprofesionales()
    {
        return $this->hasMany(Tbevalprofesionales::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbevalprovinsumos()
    {
        return $this->hasMany(Tbevalprovinsumos::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbevalprovservicios()
    {
        return $this->hasMany(Tbevalprovservicios::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbevalselectproveedores()
    {
        return $this->hasMany(Tbevalselectproveedores::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbextractos()
    {
        return $this->hasMany(Tbextractos::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbhv()
    {
        return $this->hasOne(Tbhv::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbordencompras()
    {
        return $this->hasMany(Tbordencompra::className(), ['idProveedor' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbprogservicios()
    {
        return $this->hasMany(Tbprogservicio::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbquejasreclamos()
    {
        return $this->hasMany(Tbquejasreclamos::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbsalidasinventarios()
    {
        return $this->hasMany(Tbsalidasinventario::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbtercerossucursals()
    {
        return $this->hasMany(Tbtercerossucursal::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Tbempresa::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentidad()
    {
        return $this->hasOne(Tbidentidades::className(), ['idIdentidad' => 'idIdentidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaises()
    {
        return $this->hasOne(Tbpaises::className(), ['idpaises' => 'idpaises']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCenPob()
    {
        return $this->hasOne(Tbpoblaciones::className(), ['idCenPob' => 'idCenPob']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSociedad()
    {
        return $this->hasOne(Tbsociedades::className(), ['idSociedad' => 'idSociedad']);
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
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculos::className(), ['propietario' => 'idtercero']);
    }
}
