<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GuarderiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guarderia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'gua_id') ?>

    <?= $form->field($model, 'gua_inicial') ?>

    <?= $form->field($model, 'gua_final') ?>

    <?= $form->field($model, 'guarderia') ?>

    <?= $form->field($model, 'observacion') ?>

    <?php // echo $form->field($model, 'usuario_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
