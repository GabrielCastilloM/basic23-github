<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\money\MaskMoney; 
use kartik\number\NumberControl;

/* @var $this yii\web\View */
/* @var $model app\models\Venta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venta-form">

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'unitario')->widget(MaskMoney::classname(), [
    'pluginOptions' => [
        'prefix' => '$ ',        
        'precision' => 0,
        'thousands' => '.',
        'decimal' => ',',        
        'allowZero' => true,
        
    ]

    ]);?>

<?php
$dispOptions = ['class' => 'form-control kv-monospace'];
 
 $saveOptions = [
     'type' => 'text', 
     'label'=>'<label>Saved Value: </label>', 
     'class' => 'kv-saved',
     'readonly' => true, 
     'tabindex' => 1000
 ];
  
 $saveCont = ['class' => 'kv-saved-cont'];?>

    
    <?= $form->field($model, 'total')->widget(NumberControl::classname(), [
    'maskedInputOptions' => [
        'prefix' => '$ ',
        //'suffix' => ' ¢',
        'allowMinus' => false,
        'rightAlign' => false,
        'groupSeparator' => '.',
        'radixPoint' => ','
       
    ],
    'options' => $saveOptions,
    'displayOptions' => $dispOptions,
    //'saveInputContainer' => $saveCont
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
