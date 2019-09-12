<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tbdestinosfuec".
 *
 * @property int $idDestinoFUEC
 * @property string $nombreDestinoFUEC
 * @property string $decripcionDestinoFUEC
 */
class Tbdestinosfuec extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Tbdestinosfuec';
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
            [['nombreDestinoFUEC', 'decripcionDestinoFUEC'], 'required'],
            [['decripcionDestinoFUEC'], 'string'],
            [['nombreDestinoFUEC'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDestinoFUEC' => 'Id Destino Fuec',
            'nombreDestinoFUEC' => 'Nombre Destino Fuec',
            'decripcionDestinoFUEC' => 'Decripcion Destino Fuec',
        ];
    }
}
