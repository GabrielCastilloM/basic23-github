<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ordens */

$this->title = 'Create Ordens';
$this->params['breadcrumbs'][] = ['label' => 'Ordens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordens-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
