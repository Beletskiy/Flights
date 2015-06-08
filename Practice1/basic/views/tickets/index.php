<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Flights;
use app\models\Place;


/* @var $this yii\web\View */
/* @var $model app\models\Tickets */
/* @var $form ActiveForm */

?>
<div class="tickets-index">

    <?php $form = ActiveForm::begin(); ?>
    
    <?=  $form->field($flights, 'route')->dropDownList(
      ArrayHelper::map(Flights::find()->all(), 'route', 'route'),['prompt'=>'Select flight']) ?>
    
    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
    
    <?= $form->field($passengers, 'age')->textInput
          ([ 'onfocusout'=>'$.post("index.php?r=tickets/show-class&age='.'"+$(this).val(),
                                             function(data){
                $("#place-class").html( data );
                });
          ' ]) ?>
    
    <?= $form->field($place, 'class')->dropDownList(
       ['prompt' => 'select class'],
         [ 'onfocusout'=>'$.post("index.php?r=tickets/show-place&class='.'"+$(this).val(),
                                             function(data){
                $("#place-seat_num").html( data );
                });
          ' ]   )
        ->hint('You can not choose first class for person under 14 years') ?>
    
    <?= $form->field($place, 'seat_num')->dropDownList(
       ['prompt' => 'select place']) ?>
    
    <?= $form->field($passengers, 'snp') ?>
    
    <?= $form->field($passengers, 'telephone_numb')
              ->widget(\yii\widgets\MaskedInput::className(),['mask'=>'999-999-9999']) ?>
    
    <?= $form->field($passengers, 'baggage_weight') ?>
    
       
        <?= $form->field($model, 'price') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- tickets-index -->
