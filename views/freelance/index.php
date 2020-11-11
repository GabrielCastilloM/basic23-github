<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FreelanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'Freelances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freelance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Freelance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => '\kartik\grid\RadioColumn'
            ],

            'id',
            'ref',
            'title',
            
            'description:ntext',           
            'covenant',
            'docs:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>







</div>
