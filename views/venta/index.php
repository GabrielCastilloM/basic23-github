<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\money\MaskMoney; 


/* @var $this yii\web\View */
/* @var $searchModel app\models\VentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Venta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ven_id',
            'unitario',
            [
                'attribute'=> 'unitario',                
                'format' => 'integer',   
               
               ],
            'total',
             
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>




</div>
