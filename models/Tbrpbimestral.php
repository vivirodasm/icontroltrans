<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbrpbimestral".
 *
 * @property int $idRPbimest
 * @property string $placa
 * @property string $nombreCDA
 * @property string $fechaExpRPbimest
 * @property string $fechaVtoRPbimest
 * @property string $nroCertCDARPbimest
 * @property string $descripcionRPbimest
 *
 * @property Vehiculos $placa0
 */
class Tbrpbimestral extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbrpbimestral';
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
            [['placa', 'fechaExpRPbimest', 'fechaVtoRPbimest'], 'required'],
            [['fechaExpRPbimest', 'fechaVtoRPbimest'], 'safe'],
            [['placa'], 'string', 'max' => 50],
            [['nombreCDA', 'nroCertCDARPbimest'], 'string', 'max' => 80],
            [['descripcionRPbimest'], 'string', 'max' => 255],
            [['placa'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculos::className(), 'targetAttribute' => ['placa' => 'placa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idRPbimest' => 'Id R Pbimest',
            'placa' => 'Placa',
            'nombreCDA' => 'Nombre Cda',
            'fechaExpRPbimest' => 'Fecha Exp R Pbimest',
            'fechaVtoRPbimest' => 'Fecha Vto R Pbimest',
            'nroCertCDARPbimest' => 'Nro Cert Cdar Pbimest',
            'descripcionRPbimest' => 'Descripcion R Pbimest',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaca0()
    {
        return $this->hasOne(Vehiculos::className(), ['placa' => 'placa']);
    }
}
