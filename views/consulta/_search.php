<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConsultaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consulta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'con_id') ?>

    <?= $form->field($model, 'laboratorio') ?>

    <?= $form->field($model, 'lab_archivo') ?>

    <?= $form->field($model, 'rayosx') ?>

    <?= $form->field($model, 'ray_archivo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
