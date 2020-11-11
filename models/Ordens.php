<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordens".
 *
 * @property int $id
 * @property int $cliente_id
 * @property string $fecha
 * @property string $estado
 */
class Ordens extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id', 'fecha', 'estado'], 'required'],
            [['cliente_id'], 'integer'],
            [['fecha'], 'safe'],
            [['estado'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cliente_id' => 'Cliente ID',
            'fecha' => 'Fecha',
            'estado' => 'Estado',
        ];
    }
}
