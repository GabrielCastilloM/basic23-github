<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Guarderia */

$this->title = 'Create Guarderia';
$this->params['breadcrumbs'][] = ['label' => 'Guarderias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guarderia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
