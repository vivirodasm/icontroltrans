<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbhv".
 *
 * @property int $idhv
 * @property string $idtercero
 * @property string $estado
 * @property string $empresaLab
 * @property string $fecha_ing
 * @property string $TipoContrato
 * @property string $vigContrato
 * @property string $cargoHV
 * @property string $tipoEmpl
 * @property string $fechanto
 * @property string $fechaDef
 * @property string $tiposangre
 * @property string $estadocivil
 * @property string $nivelEstudio
 * @property string $habilidades
 * @property string $licencia
 * @property string $categoria
 * @property string $vigLicencia
 * @property string $jefeInmediato
 * @property string $fechaAfilSS
 * @property string $EPS
 * @property string $ARP
 * @property string $FP
 * @property string $CCF
 * @property string $Cesantias
 * @property string $EntBancaria
 * @property string $TipoCuenta
 * @property string $NroCuenta
 * @property string $ultPagoSS
 * @property string $notasHV
 * @property int $hvBloqueado
 * @property string $rutaImgFoto
 * @property string $rutaImgCedulaF
 * @property string $rutaImgLicenciaF
 * @property string $rutaImgLMilitarF
 * @property string $rutaImgCedulaP
 * @property string $rutaImgLicenciaP
 * @property string $rutaImgLMilitarP
 * @property int $Aud_Usuario
 * @property string $Aud_Fecha
 * @property int $Aud_UsuarioEdit
 * @property string $Aud_FechaEdit
 *
 * @property Tbdetaconductores[] $tbdetaconductores
 */
class Tbhv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbhv';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
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
            [['idtercero', 'estado', 'TipoContrato', 'tipoEmpl', 'fechanto', 'jefeInmediato', 'Aud_Usuario', 'Aud_Fecha'], 'required'],
            [['fecha_ing', 'vigContrato', 'fechanto', 'fechaDef', 'vigLicencia', 'fechaAfilSS', 'ultPagoSS', 'Aud_Fecha', 'Aud_FechaEdit'], 'safe'],
            [['hvBloqueado', 'Aud_Usuario', 'Aud_UsuarioEdit'], 'integer'],
            [['idtercero'], 'string', 'max' => 15],
            [['estado'], 'string', 'max' => 10],
            [['empresaLab', 'tipoEmpl', 'nivelEstudio', 'licencia', 'categoria', 'jefeInmediato'], 'string', 'max' => 50],
            [['TipoContrato', 'cargoHV'], 'string', 'max' => 45],
            [['tiposangre', 'estadocivil'], 'string', 'max' => 20],
            [['habilidades', 'notasHV', 'rutaImgFoto', 'rutaImgCedulaF', 'rutaImgLicenciaF', 'rutaImgLMilitarF', 'rutaImgCedulaP', 'rutaImgLicenciaP', 'rutaImgLMilitarP'], 'string', 'max' => 255],
            [['EPS', 'ARP', 'FP', 'CCF', 'Cesantias', 'EntBancaria', 'TipoCuenta', 'NroCuenta'], 'string', 'max' => 100],
            [['idtercero'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idhv' => 'Idhv',
            'idtercero' => 'Idtercero',
            'estado' => 'Estado',
            'empresaLab' => 'Empresa Lab',
            'fecha_ing' => 'Fecha Ing',
            'TipoContrato' => 'Tipo Contrato',
            'vigContrato' => 'Vig Contrato',
            'cargoHV' => 'Cargo Hv',
            'tipoEmpl' => 'Tipo Empl',
            'fechanto' => 'Fechanto',
            'fechaDef' => 'Fecha Def',
            'tiposangre' => 'Tiposangre',
            'estadocivil' => 'Estadocivil',
            'nivelEstudio' => 'Nivel Estudio',
            'habilidades' => 'Habilidades',
            'licencia' => 'Licencia',
            'categoria' => 'Categoria',
            'vigLicencia' => 'Vig Licencia',
            'jefeInmediato' => 'Jefe Inmediato',
            'fechaAfilSS' => 'Fecha Afil Ss',
            'EPS' => 'Eps',
            'ARP' => 'Arp',
            'FP' => 'Fp',
            'CCF' => 'Ccf',
            'Cesantias' => 'Cesantias',
            'EntBancaria' => 'Ent Bancaria',
            'TipoCuenta' => 'Tipo Cuenta',
            'NroCuenta' => 'Nro Cuenta',
            'ultPagoSS' => 'Ult Pago Ss',
            'notasHV' => 'Notas Hv',
            'hvBloqueado' => 'Hv Bloqueado',
            'rutaImgFoto' => 'Ruta Img Foto',
            'rutaImgCedulaF' => 'Ruta Img Cedula F',
            'rutaImgLicenciaF' => 'Ruta Img Licencia F',
            'rutaImgLMilitarF' => 'Ruta Img L Militar F',
            'rutaImgCedulaP' => 'Ruta Img Cedula P',
            'rutaImgLicenciaP' => 'Ruta Img Licencia P',
            'rutaImgLMilitarP' => 'Ruta Img L Militar P',
            'Aud_Usuario' => 'Aud Usuario',
            'Aud_Fecha' => 'Aud Fecha',
            'Aud_UsuarioEdit' => 'Aud Usuario Edit',
            'Aud_FechaEdit' => 'Aud Fecha Edit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbdetaconductores()
    {
        return $this->hasMany(Tbdetaconductores::className(), ['idhv' => 'idhv']);
    }
}
