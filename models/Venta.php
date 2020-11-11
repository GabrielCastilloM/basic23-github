<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta".
 *
 * @property int $ven_id
 * @property int $unitario
 * @property int $total
 */
class Venta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unitario', 'total'], 'required'],
            [['unitario', 'total'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ven_id' => 'Ven ID',
            'unitario' => 'Unitario',
            'total' => 'Total',
        ];
    }
}
