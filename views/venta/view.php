<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\money\MaskMoney; 
use yii\helpers\ArrayHelper;
use app\models\Venta;

/* @var $this yii\web\View */
/* @var $model app\models\Venta */

$this->title = $model->ven_id;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="venta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ven_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ven_id], [
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
            'ven_id',
            //'unitario', 
            [
                'attribute'=> 'unitario',                
                'format' => 'integer',   
               
               ],
            'total',
        ],
    ]) ?>



</div>
