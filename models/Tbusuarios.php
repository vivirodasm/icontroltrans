<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbusuarios".
 *
 * @property int $IdUsuario
 * @property string $NombreUsuario
 * @property string $ClaveUsuario
 * @property string $CargoUsuario
 * @property int $ActivoUsuario
 * @property int $TipoAcceso 1: Administrador, 2: Usuario
 * @property int $ActivarShift
 * @property string $mail_Usuario
 * @property int $Aud_Usuario
 * @property string $Aud_Fecha
 * @property int $Aud_UsuarioEdit
 * @property string $Aud_FechaEdit
 *
 * @property Tbcategdocumentos[] $tbcategdocumentos
 * @property Tbconsolservicio[] $tbconsolservicios
 * @property Tbcontratos[] $tbcontratos
 * @property Tbconvenios[] $tbconvenios
 * @property Tbcorreo[] $tbcorreos
 * @property Tbcotizacion[] $tbcotizacions
 * @property Tbdocsmp[] $tbdocsmps
 * @property Tbencuesta[] $tbencuestas
 * @property Tbevalprofesionales[] $tbevalprofesionales
 * @property Tbevalprovinsumos[] $tbevalprovinsumos
 * @property Tbevalprovservicios[] $tbevalprovservicios
 * @property Tbevalprovservtransp[] $tbevalprovservtransps
 * @property Tbevalselectproveedores[] $tbevalselectproveedores
 * @property Tbextractos[] $tbextractos
 * @property Tbgrupoempcontratantes[] $tbgrupoempcontratantes
 * @property Tbgrupofuec[] $tbgrupofuecs
 * @property Tbhv[] $tbhvs
 * @property Tbinvestigaciones[] $tbinvestigaciones
 * @property Tbliqservicio[] $tbliqservicios
 * @property Tbliqservicioprog[] $tbliqservicioprogs
 * @property Tblog[] $tblogs
 * @property Tbmantenimientos[] $tbmantenimientos
 * @property Tbpalistamiento[] $tbpalistamientos
 * @property Tbpartesrevisar[] $tbpartesrevisars
 * @property Tbpermiacceso[] $tbpermiaccesos
 * @property Tbpermicrear[] $tbpermicrears
 * @property Tbpermiedit[] $tbpermiedits
 * @property Tbpgtencuesta[] $tbpgtencuestas
 * @property Tbprocesos[] $tbprocesos
 * @property Tbprogservicio[] $tbprogservicios
 * @property Tbquejasreclamos[] $tbquejasreclamos
 * @property Tbreferencias[] $tbreferencias
 * @property Tbsalidasinventario[] $tbsalidasinventarios
 * @property Terceros[] $terceros
 * @property Vehiculos[] $vehiculos
 */
class Tbusuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbusuarios';
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
            [['IdUsuario', 'NombreUsuario', 'ClaveUsuario', 'CargoUsuario', 'Aud_Usuario', 'Aud_Fecha'], 'required'],
            [['IdUsuario', 'ActivoUsuario', 'TipoAcceso', 'ActivarShift', 'Aud_Usuario', 'Aud_UsuarioEdit'], 'integer'],
            [['Aud_Fecha', 'Aud_FechaEdit'], 'safe'],
            [['NombreUsuario'], 'string', 'max' => 80],
            [['ClaveUsuario'], 'string', 'max' => 15],
            [['CargoUsuario'], 'string', 'max' => 50],
            [['mail_Usuario'], 'string', 'max' => 100],
            [['IdUsuario'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdUsuario' => 'Id Usuario',
            'NombreUsuario' => 'Nombre Usuario',
            'ClaveUsuario' => 'Clave Usuario',
            'CargoUsuario' => 'Cargo Usuario',
            'ActivoUsuario' => 'Activo Usuario',
            'TipoAcceso' => 'Tipo Acceso',
            'ActivarShift' => 'Activar Shift',
            'mail_Usuario' => 'Mail Usuario',
            'Aud_Usuario' => 'Aud Usuario',
            'Aud_Fecha' => 'Aud Fecha',
            'Aud_UsuarioEdit' => 'Aud Usuario Edit',
            'Aud_FechaEdit' => 'Aud Fecha Edit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbcategdocumentos()
    {
        return $this->hasMany(Tbcategdocumentos::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbconsolservicios()
    {
        return $this->hasMany(Tbconsolservicio::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbcontratos()
    {
        return $this->hasMany(Tbcontratos::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbconvenios()
    {
        return $this->hasMany(Tbconvenios::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbcorreos()
    {
        return $this->hasMany(Tbcorreo::className(), ['usuarioRemite' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbcotizacions()
    {
        return $this->hasMany(Tbcotizacion::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdocsmps()
    {
        return $this->hasMany(Tbdocsmp::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbencuestas()
    {
        return $this->hasMany(Tbencuesta::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbevalprofesionales()
    {
        return $this->hasMany(Tbevalprofesionales::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbevalprovinsumos()
    {
        return $this->hasMany(Tbevalprovinsumos::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbevalprovservicios()
    {
        return $this->hasMany(Tbevalprovservicios::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbevalprovservtransps()
    {
        return $this->hasMany(Tbevalprovservtransp::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbevalselectproveedores()
    {
        return $this->hasMany(Tbevalselectproveedores::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbextractos()
    {
        return $this->hasMany(Tbextractos::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbgrupoempcontratantes()
    {
        return $this->hasMany(Tbgrupoempcontratantes::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbgrupofuecs()
    {
        return $this->hasMany(Tbgrupofuec::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbhvs()
    {
        return $this->hasMany(Tbhv::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbinvestigaciones()
    {
        return $this->hasMany(Tbinvestigaciones::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbliqservicios()
    {
        return $this->hasMany(Tbliqservicio::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbliqservicioprogs()
    {
        return $this->hasMany(Tbliqservicioprog::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblogs()
    {
        return $this->hasMany(Tblog::className(), ['Aud_UsuarioEdit' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbmantenimientos()
    {
        return $this->hasMany(Tbmantenimientos::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbpalistamientos()
    {
        return $this->hasMany(Tbpalistamiento::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbpartesrevisars()
    {
        return $this->hasMany(Tbpartesrevisar::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbpermiaccesos()
    {
        return $this->hasMany(Tbpermiacceso::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbpermicrears()
    {
        return $this->hasMany(Tbpermicrear::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbpermiedits()
    {
        return $this->hasMany(Tbpermiedit::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbpgtencuestas()
    {
        return $this->hasMany(Tbpgtencuesta::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbprocesos()
    {
        return $this->hasMany(Tbprocesos::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbprogservicios()
    {
        return $this->hasMany(Tbprogservicio::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbquejasreclamos()
    {
        return $this->hasMany(Tbquejasreclamos::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbreferencias()
    {
        return $this->hasMany(Tbreferencias::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbsalidasinventarios()
    {
        return $this->hasMany(Tbsalidasinventario::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerceros()
    {
        return $this->hasMany(Terceros::className(), ['Aud_Usuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculos::className(), ['Aud_Usuario' => 'IdUsuario']);
    }
}
