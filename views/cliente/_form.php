<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cliente;
use kartik\form\ActiveForm;



/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'genero')->textInput(['maxlength' => true]) ?--> 

    
    <?= $form->field($model, 'genero')->dropDownList(
    	ArrayHelper::map(cliente::find()->all(),'cedula','nombre'),
    	['prompt'=>'Seleccione Cliente referidor']
    ) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
