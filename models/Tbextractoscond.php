<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbextractoscond".
 *
 * @property int $idExtCond
 * @property string $FUEC
 * @property int $idhv
 * @property string $licencia
 * @property string $vigLicencia
 * @property string $ultPagoSS
 */
class Tbextractoscond extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbextractoscond';
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
            [['FUEC', 'idhv', 'licencia', 'vigLicencia', 'ultPagoSS'], 'required'],
            [['idhv'], 'integer'],
            [['vigLicencia', 'ultPagoSS'], 'safe'],
            [['FUEC'], 'string', 'max' => 25],
            [['licencia'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idExtCond' => 'Id Ext Cond',
            'FUEC' => 'Fuec',
            'idhv' => 'Idhv',
            'licencia' => 'Licencia',
            'vigLicencia' => 'Vig Licencia',
            'ultPagoSS' => 'Ult Pago Ss',
        ];
    }
}
