<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tbrutas".
 *
 * @property int $idRuta
 * @property string $nombreRuta
 * @property int $ciudadOrigen
 * @property int $ciudadDestino
 * @property string $decripcionRuta
 * @property string $tarifaAutomovil
 * @property string $tarifaCampero
 * @property string $tarifaCamioneta
 * @property string $tarifaAerovan
 * @property string $tarifaMicrobus
 * @property string $tarifaBuseta
 * @property string $tarifaBuseton
 * @property string $tarifaBus
 */
class Tbrutas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Tbrutas';
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
            [['nombreRuta', 'ciudadOrigen', 'ciudadDestino', 'decripcionRuta'], 'required'],
            [['ciudadOrigen', 'ciudadDestino'], 'integer'],
            [['decripcionRuta'], 'string'],
            [['tarifaAutomovil', 'tarifaCampero', 'tarifaCamioneta', 'tarifaAerovan', 'tarifaMicrobus', 'tarifaBuseta', 'tarifaBuseton', 'tarifaBus'], 'number'],
            [['nombreRuta'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idRuta' => 'Id Ruta',
            'nombreRuta' => 'Nombre Ruta',
            'ciudadOrigen' => 'Ciudad Origen',
            'ciudadDestino' => 'Ciudad Destino',
            'decripcionRuta' => 'Decripcion Ruta',
            'tarifaAutomovil' => 'Tarifa Automovil',
            'tarifaCampero' => 'Tarifa Campero',
            'tarifaCamioneta' => 'Tarifa Camioneta',
            'tarifaAerovan' => 'Tarifa Aerovan',
            'tarifaMicrobus' => 'Tarifa Microbus',
            'tarifaBuseta' => 'Tarifa Buseta',
            'tarifaBuseton' => 'Tarifa Buseton',
            'tarifaBus' => 'Tarifa Bus',
        ];
    }
}
