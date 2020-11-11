<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\User;
use kartik\daterange\DateRangePicker;
use kartik\form\ActiveForm;
//use kartik\widgets\DateTimePicker;
use kartik\datetime\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Guarderia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guarderia-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?php echo $form->field($model, 'gua_inicial', [
    'addon'=>['prepend'=>['content'=>'<i class="fas fa-calendar-alt"></i>']],
    'options'=>['class'=>'drp-container form-group']
])->widget(DateRangePicker::classname(), [
    'useWithAddon'=>true
]);?>

    

    <?= $form->field($model, 'gua_final')->textInput() ?>


    <?php echo  $form->field($model, 'guarderia')->widget(DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Enter event time ...'],
	'pluginOptions' => [
		'autoclose' => true
	]
]);?>

    <!--?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?-->
    <?php echo $form->field($model, 'observacion', [
    'addon'=>['prepend'=>['content'=>'<i class="fas fa-calendar-alt"></i>']],
    'options'=>['class'=>'drp-container form-group']
])->widget(DateRangePicker::classname(), [
    'useWithAddon'=>true
]);?>

    

    <?php /*$data = [
    'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 
    'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
    'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
    'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
    'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
    'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
    'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
    'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
    'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
    ];*/

    $usuarios = User::find()->all();
                        $data = array();
                        foreach ($usuarios as $usuario)
                            $data[$usuario->id] = $usuario->username . ' '. $usuario->password;
 
 
// Usage with ActiveForm and model
echo $form->field($model, 'usuario_id')->widget(Select2::classname(), [
    'data' => $data,
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
