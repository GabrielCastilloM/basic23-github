<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use app\models\User;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $searchModel app\models\GuarderiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guarderias esta bien arreglado en la rama hotfix';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guarderia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Guarderia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'gua_id',
            'gua_inicial',
            'gua_final',
            'guarderia',
            'observacion',
            'usuario_id',
            [
                'attribute' => 'usuario_id', 
                //'width' => '250px',

                'filterType' => GridView::FILTER_SELECT2,
            'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'category_name'), 
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Any category']
        ],
            'description:ntext',           
            'covenant',
            'docs:ntext',

            ['class' => 'yii\grid\ActionColumn'],                
          
            


        ],
    ]); ?>


</div>
