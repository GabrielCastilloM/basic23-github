<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;


/**
 * This is the model class for table "freelance".
 *
 * @property int $id
 * @property string|null $ref
 * @property string $title
 * @property string|null $description
 * @property string|null $covenant
 * @property string|null $docs
 */
class Freelance extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER = 'freelances';
    /**
     * {@inheritdoc}
     */
   

    public static function tableName()
    {
        return 'freelance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['ref'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 255],
            [['covenant'],'file','maxFiles'=>1], //<---
            [['docs'],'file','maxFiles'=>10,'skipOnEmpty'=>true]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'Ref',
            'title' => 'Title',
            'description' => 'Description',
            'covenant' => 'Covenant',
            'docs' => 'Docs',
        ];
    }

    public static function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
    }
    
    public static function getUploadUrl(){
        return Url::base(true).'/'.self::UPLOAD_FOLDER.'/';
    }

    public function listDownloadFiles($type){
        $docs_file = '';
        if(in_array($type, ['docs','covenant'])){         
                $data = $type==='docs'?$this->docs:$this->covenant;
                $files = Json::decode($data);
               if(is_array($files)){
                    $docs_file ='<ul>';
                    foreach ($files as $key => $value) {
                       $docs_file .= '<li>'.Html::a($value,['/freelance/download','id'=>$this->id,'file'=>$key,'file_name'=>$value]).'</li>';
                    }
                    $docs_file .='</ul>';
               }
        }
        
        return $docs_file;
       }

       public function initialPreview($data,$field,$type='file'){
        $initial = [];
        $files = Json::decode($data);
        if(is_array($files)){
             foreach ($files as $key => $value) {
                if($type=='file'){
                    $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                }elseif($type=='config'){
                    $initial[] = [
                        'caption'=> $value,
                        'width'  => '120px',
                        'url'    => Url::to(['/freelance/deletefile','id'=>$this->id,'fileName'=>$key,'field'=>$field]),
                        'key'    => $key
                    ];
                }
                else{
                    $initial[] = Html::img(self::getUploadUrl().$this->ref.'/'.$value,['class'=>'file-preview-image', 'alt'=>$model->file_name, 'title'=>$model->file_name]);
                }
             }
     }
    return $initial;
    }
}
