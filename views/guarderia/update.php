<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Guarderia */

$this->title = 'Update Guarderia: ' . $model->gua_id;
$this->params['breadcrumbs'][] = ['label' => 'Guarderias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gua_id, 'url' => ['view', 'id' => $model->gua_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guarderia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
