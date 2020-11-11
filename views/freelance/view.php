<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\modeles\Freelance;

/* @var $this yii\web\View */
/* @var $model app\models\Freelance */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Freelances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="freelance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ref',
            'title',
            'description:ntext',
            //'covenant',
            //'docs:ntext',
            ['attribute'=>'covenant','value'=>$model->listDownloadFiles('covenant'),'format'=>'html'],
            ['attribute'=>'docs','value'=>$model->listDownloadFiles('docs'),'format'=>'html'],
        ],
    ]) ?>

</div>
