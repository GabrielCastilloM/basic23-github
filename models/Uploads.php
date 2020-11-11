<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uploads".
 *
 * @property int $id
 * @property string|null $category
 * @property string|null $excelFile
 * @property string|null $path
 * @property string|null $dateUploaded
 */
class Uploads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dateUploaded'], 'safe'],
            [['category', 'path'], 'string', 'max' => 45],
            [['excelFile'], 'file', 'extensions'=>'xls, xlsx', 'maxFiles' => 5, 'skipOnEmpty'=>false,
'wrongExtension'=>'{extensions} files only', 'on'=>'update'
],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'excelFile' => 'Excel File',
            'path' => 'Path',
            'dateUploaded' => 'Date Uploaded',
        ];
    }
}
