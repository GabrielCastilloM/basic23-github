<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Consulta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consulta-form">

    
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'laboratorio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lab_archivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lab_archivo')->fileInput() ?>

    <button>Enviar</button>


    <?= $form->field($model, 'rayosx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ray_archivo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
