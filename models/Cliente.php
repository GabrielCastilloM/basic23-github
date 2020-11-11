<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $cedula
 * @property string $nombre
 * @property string $apellido
 * @property string $genero
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula', 'nombre', 'apellido', 'genero'], 'required'],
            [['cedula'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 100],
            [['genero'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cedula' => 'Cedula',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'genero' => 'Genero',
        ];
    }
}
