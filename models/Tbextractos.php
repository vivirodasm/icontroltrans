<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbextractos".
 *
 * @property int $consFUEC Consecutivo incremental del FUEC
 * @property string $FUEC
 * @property int $anioExtracto
 * @property int $idExtracto
 * @property string $antFUEC
 * @property string $idtercero
 * @property string $fechaExtracto
 * @property string $resp_Contrato
 * @property string $cedResp_Contrato
 * @property string $dirResp_Contrato
 * @property string $telResp_Contrato
 * @property string $convenioEmp
 * @property string $fechaVtoConvenio
 * @property int $nroContrato
 * @property int $anioContrato
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property int $ciudadOrigen
 * @property int $ciudadDestino
 * @property int $destinosVarios
 * @property int $idDestino
 * @property string $descripDestino
 * @property int $idRuta
 * @property string $descripRuta
 * @property string $idvehiculo
 * @property string $vehVtoTO
 * @property string $vehVtoExtintor
 * @property string $vehVtoCDA
 * @property string $vehVtoSOAT
 * @property string $vehVtoRCC
 * @property string $vehVtoRCE
 * @property string $vehVtoBimestral
 * @property string $vlrServicio
 * @property string $vlrFUEC
 * @property string $vlrCONTBFUEC
 * @property string $vlrRecibido
 * @property int $rboFUEC
 * @property string $tipoContrato
 * @property string $notaExtracto
 * @property int $validoPDF
 * @property int $membreteEmp
 * @property int $anuladoFUEC
 * @property int $facturado
 * @property int $GrupoFUEC
 * @property int $Aud_Usuario
 * @property string $Aud_Fecha
 * @property int $Aud_UsuarioEdit
 * @property string $Aud_FechaEdit
 *
 * @property Tbtipocontrato $tipoContrato0
 * @property Tbusuarios $audUsuario
 * @property Terceros $tercero
 * @property Tbcontratos $nroContrato0
 * @property Tbdestinosfuec $destino
 * @property Tbrutas $ruta
 * @property Vehiculos $vehiculo
 * @property Tbextractosacomp[] $tbextractosacomps
 * @property Tbextractoscond[] $tbextractosconds
 */
class Tbextractos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbextractos';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db1');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FUEC','idRuta', 'anioExtracto', 'idExtracto', 'idtercero', 'fechaExtracto', 'nroContrato', 'anioContrato', 'fechaInicio', 'fechaFin', 'ciudadOrigen', 'descripRuta', 'idvehiculo', 'vehVtoTO', 'vehVtoExtintor', 'vehVtoCDA', 'vehVtoSOAT', 'vehVtoRCC', 'vehVtoRCE', 'vehVtoBimestral', 'Aud_Usuario', 'Aud_Fecha'], 'required'],
            [['anioExtracto', 'idExtracto', 'nroContrato', 'anioContrato', 'ciudadOrigen', 'ciudadDestino', 'destinosVarios', 'idDestino', 'idRuta', 'rboFUEC', 'validoPDF', 'membreteEmp', 'anuladoFUEC', 'facturado', 'GrupoFUEC', 'Aud_Usuario', 'Aud_UsuarioEdit'], 'integer'],
            [['fechaExtracto', 'fechaVtoConvenio', 'fechaInicio', 'fechaFin', 'vehVtoTO', 'vehVtoExtintor', 'vehVtoCDA', 'vehVtoSOAT', 'vehVtoRCC', 'vehVtoRCE', 'vehVtoBimestral', 'Aud_Fecha', 'Aud_FechaEdit'], 'safe'],
            [['descripDestino', 'descripRuta'], 'string'],
            [['vlrServicio', 'vlrFUEC', 'vlrCONTBFUEC', 'vlrRecibido'], 'number'],
            [['FUEC', 'antFUEC'], 'string', 'max' => 25],
            [['idtercero'], 'string', 'max' => 15],
            [['resp_Contrato', 'convenioEmp', 'tipoContrato'], 'string', 'max' => 80],
            [['cedResp_Contrato'], 'string', 'max' => 20],
            [['dirResp_Contrato', 'notaExtracto'], 'string', 'max' => 255],
            [['telResp_Contrato', 'idvehiculo'], 'string', 'max' => 50],
            [['FUEC'], 'unique'],
            [['anioExtracto', 'idExtracto', 'nroContrato', 'anioContrato'], 'unique', 'targetAttribute' => ['anioExtracto', 'idExtracto', 'nroContrato', 'anioContrato']],
            [['tipoContrato'], 'exist', 'skipOnError' => true, 'targetClass' => Tbtipocontrato::className(), 'targetAttribute' => ['tipoContrato' => 'tipoContrato']],
            [['Aud_Usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Tbusuarios::className(), 'targetAttribute' => ['Aud_Usuario' => 'IdUsuario']],
            [['idtercero'], 'exist', 'skipOnError' => true, 'targetClass' => Terceros::className(), 'targetAttribute' => ['idtercero' => 'idtercero']],
            [['nroContrato', 'anioContrato'], 'exist', 'skipOnError' => true, 'targetClass' => Tbcontratos::className(), 'targetAttribute' => ['nroContrato' => 'idContrato', 'anioContrato' => 'anioContrato']],
            [['idDestino'], 'exist', 'skipOnError' => true, 'targetClass' => Tbdestinosfuec::className(), 'targetAttribute' => ['idDestino' => 'idDestinoFUEC']],
            [['idRuta'], 'exist', 'skipOnError' => true, 'targetClass' => Tbrutas::className(), 'targetAttribute' => ['idRuta' => 'idRuta']],
            [['idvehiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculos::className(), 'targetAttribute' => ['idvehiculo' => 'placa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'consFUEC' => 'Cons Fuec',
            'FUEC' => 'FUEC',
            'anioExtracto' => 'Año Extracto',
            'idExtracto' => 'Id Extracto',
            'antFUEC' => 'FUEC anterior',
            'idtercero' => 'Contratante',
            'fechaExtracto' => 'Fecha Extracto',
            'resp_Contrato' => 'Responsable',
            'cedResp_Contrato' => 'Cédula',
            'dirResp_Contrato' => 'Dirección',
            'telResp_Contrato' => 'Teléfono',
            'convenioEmp' => 'Convenio Empresarial',
            'fechaVtoConvenio' => 'Fecha Vto Convenio',
            'nroContrato' => 'N° Contrato',
            'anioContrato' => 'Año Contrato',
            'fechaInicio' => 'Fecha Inicio',
            'fechaFin' => 'Fecha Fin',
            'ciudadOrigen' => 'Ciudad Origen',
            'ciudadDestino' => 'Ciudad Destino',
            'destinosVarios' => 'Varios Destinos',
            'idDestino' => 'Id Destino',
            'descripDestino' => 'Descripción Destino',
            'idRuta' => 'Ruta',
            'descripRuta' => 'Descripción Ruta',
            'idvehiculo' => 'Placa - Lateral',
            'vehVtoTO' => 'Operación',
            'vehVtoExtintor' => 'Extintor',
            'vehVtoCDA' => 'CDA',
            'vehVtoSOAT' => 'SOAT',
            'vehVtoRCC' => 'RCC',
            'vehVtoRCE' => 'RCE',
            'vehVtoBimestral' => 'Bimestral',
            'vlrServicio' => 'Servicio',
            'vlrFUEC' => 'Vlr Fuec',
            'vlrCONTBFUEC' => 'Cont FUEC',
            'vlrRecibido' => 'Vlr Recibido',
            'rboFUEC' => 'Rbo Fuec',
            'tipoContrato' => 'Tipo Contrato',
            'notaExtracto' => 'Nota Extracto',
            'validoPDF' => 'Valido Pdf',
            'membreteEmp' => 'Membrete Emp',
            'anuladoFUEC' => 'Anulado Fuec',
            'facturado' => 'Facturado',
            'GrupoFUEC' => 'Grupo Fuec',
            'Aud_Usuario' => 'Aud Usuario',
            'Aud_Fecha' => 'Aud Fecha',
            'Aud_UsuarioEdit' => 'Aud Usuario Edit',
            'Aud_FechaEdit' => 'Aud Fecha Edit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoContrato0()
    {
        return $this->hasOne(Tbtipocontrato::className(), ['tipoContrato' => 'tipoContrato']);
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
    public function getTercero()
    {
        return $this->hasOne(Terceros::className(), ['idtercero' => 'idtercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNroContrato0()
    {
        return $this->hasOne(Tbcontratos::className(), ['idContrato' => 'nroContrato', 'anioContrato' => 'anioContrato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDestino()
    {
        return $this->hasOne(Tbdestinosfuec::className(), ['idDestinoFUEC' => 'idDestino']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuta()
    {
        return $this->hasOne(Tbrutas::className(), ['idRuta' => 'idRuta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculo()
    {
        return $this->hasOne(Vehiculos::className(), ['placa' => 'idvehiculo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbextractosacomps()
    {
        return $this->hasMany(Tbextractosacomp::className(), ['FUEC' => 'FUEC']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbextractosconds()
    {
        return $this->hasMany(Tbextractoscond::className(), ['FUEC' => 'FUEC']);
    }
}
