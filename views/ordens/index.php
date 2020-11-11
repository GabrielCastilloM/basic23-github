<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdensSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ordens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordens-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ordens', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cliente_id',
            'fecha',
            'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?-->


    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
 
        'id',
        'cliente_id',
        //'fecha',
        [
            'attribute' => 'fecha',
            'value' => 'fecha',
            'format'=>'raw',
            'options' => ['style' => 'width: 25%;'],
            'filter' => DateRangePicker::widget([
                'model' => $searchModel,
                'attribute' => 'rango_fecha',
                'useWithAddon'=>false,
                'convertFormat'=>true,
                'pluginOptions'=>[
                    'locale'=>['format'=>'Y-m-d']
                ],
            ])
        ],
        'estado',
 
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>


</div>
