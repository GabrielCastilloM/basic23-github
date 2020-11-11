<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guarderia".
 *
 * @property int $gua_id
 * @property string $gua_inicial
 * @property string $gua_final
 * @property string $guarderia
 * @property string $observacion
 * @property int $usuario_id
 */
class Guarderia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guarderia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gua_inicial', 'gua_final', 'guarderia', 'observacion', 'usuario_id'], 'required'],
            [['gua_inicial', 'gua_final', 'guarderia'], 'safe'],
            [['usuario_id'], 'integer'],
            [['observacion'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gua_id' => 'Gua ID',
            'gua_inicial' => 'Gua Inicial',
            'gua_final' => 'Gua Final',
            'guarderia' => 'Guarderia',
            'observacion' => 'Observacion',
            'usuario_id' => 'Usuario ID',
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'cliente_id']);
    }
}
