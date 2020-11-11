<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Freelance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="freelance-form">
   
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'ref')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
   
    <?= $form->field($model, 'covenant')->widget(FileInput::classname(), [
    //'options' => ['accept' => 'image/*'],
    'pluginOptions' => [
        'initialPreview'=>$model->initialPreview($model->covenant,'covenant','file'),
        'initialPreviewConfig'=>$model->initialPreview($model->covenant,'covenant','config'),
        'allowedFileExtensions'=>['pdf'],
        'showPreview' => true,
        'showCaption' => true,
        'showRemove' => true,
        'showUpload' => false
     ]
    ]); ?>

   
<?= $form->field($model, 'docs[]')->widget(FileInput::classname(), [
    'options' => [
        //'accept' => 'image/*',
        'multiple' => true
    ],
    'pluginOptions' => [
        'initialPreview'=>$model->initialPreview($model->docs,'docs','file'),
        'initialPreviewConfig'=>$model->initialPreview($model->docs,'docs','config'),
        'allowedFileExtensions'=>['pdf','doc','docx','xls','xlsx'],
        'showPreview' => true,
        'showCaption' => true,
        'showRemove' => true,
        'showUpload' => false,
        'overwriteInitial'=>false
     ]
    ]); ?>


    <div class="form-group">
    <?= Html::submitButton('<i class="glyphicon glyphicon-plus"></i> '.($model->isNewRecord ? 'Create' : 'Update'), ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary').' btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
