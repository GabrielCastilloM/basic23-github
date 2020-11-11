<?php

use yii\helpers\Html;
use yii\grid\GridView;
use lav45\widget\FullCalendar;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConsultaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consulta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Consulta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'con_id',
            'laboratorio',
            'lab_archivo',
            'rayosx',
            'ray_archivo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

<?php $fecha = date('Y-m-d');
echo $fecha;
?>
<br>
<?php
echo date('l jS \of F Y h:i:s A');
?>

<meta charset='utf-8'>

<?php
setlocale(LC_TIME, "C");
echo strftime("%A");
setlocale(LC_TIME, "fi_FI");
echo strftime(" en finlandés es %A,");
setlocale(LC_TIME, "fr_FR");
echo strftime(" en francés %A y");
setlocale(LC_TIME, "de_DE");
echo strftime(" en alemán %A.\n");
?>


<?= FullCalendar::widget([
    'googleCalendar' => true,  // If the plugin displays a Google Calendar. Default false
    'clientOptions' => [
        // put your options and callbacks here
        // see http://fullcalendar.io/docs/
        'lang' => 'pt-br', // optional, if empty get app language
    ],
]); ?>
