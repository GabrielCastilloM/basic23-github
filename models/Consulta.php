<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consulta".
 *
 * @property int $con_id
 * @property string|null $laboratorio
 * @property string|null $lab_archivo
 * @property string|null $rayosx
 * @property string|null $ray_archivo
 */
class Consulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['laboratorio', 'lab_archivo', 'rayosx', 'ray_archivo'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'con_id' => 'Con ID',
            'laboratorio' => 'Laboratorio',
            'lab_archivo' => 'Lab Archivo',
            'rayosx' => 'Rayosx',
            'ray_archivo' => 'Ray Archivo',
        ];
    }
}
