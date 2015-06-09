<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Flights;
//use app\models\Place;


/* @var $this yii\web\View */
/* @var $model app\models\Tickets */
/* @var $form ActiveForm */

?>
<div class="tickets-index">

    <?php $form = ActiveForm::begin(); ?>
    
    <?=  $form->field($flights, 'route')->dropDownList(
      ArrayHelper::map(Flights::find()->all(), 'route', 'route'),
           [ 'onchange'=>'$.post("index.php?r=tickets/calculate-price&route="+$(this).val()
               +"&class="+0+"&baggage_weight="+0+"&age="+0,
               function(data){
                       $("#tickets-price").val( data );
             });' ,
               'prompt'=>'Select flight' ]) ?>
    
    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
    
    <?= $form->field($passengers, 'age')->textInput
          ([ 'onfocusout'=>'$.post("index.php?r=tickets/show-class&age="+$(this).val(),
             function(data){
                $("#place-class").html( data );
             });
             $.post("index.php?r=tickets/calculate-price&age="+$(this).val()
             +"&route="+0+"&baggage_weight="+0+"&class="+0,
             function(data){
                $("#tickets-price").val( data );
             });
          ' ]) ?>
    
    <?= $form->field($place, 'class')->dropDownList(
          ['prompt' => 'select class'],
         [ 'onchange'=>'$.post("index.php?r=tickets/show-place&class="+$(this).val(),
                                             function(data){
                $("#place-seat_num").html( data );
                });
                $.post("index.php?r=tickets/calculate-price&class="+$(this).val()+"&route="+0+"&baggage_weight="+0+"&age="+0,
                function(data){
                          $("#tickets-price").val( data );
                }); ' ])
        ->hint('You can not choose first class for person under 14 years') ?>
    
    <?= $form->field($place, 'seat_num')->dropDownList(
       ['prompt' => 'select place']) ?>
    
    <?= $form->field($passengers, 'snp') ?>
    
    <?= $form->field($passengers, 'telephone_numb')
              ->widget(\yii\widgets\MaskedInput::className(),['mask'=>'999-999-9999']) ?>
    
    <?= $form->field($passengers, 'baggage_weight')->textInput(
           [ 'onfocusout'=>'$.post("index.php?r=tickets/calculate-price&baggage_weight="+$(this).val()
               +"&class="+0+"&route="+0+"&age="+0,
               function(data){
                       $("#tickets-price").val( data );
               });
          ' ])
            ->widget(\yii\widgets\MaskedInput::className(),['mask' => '9',
                   'clientOptions' => ['repeat' => 3, 'greedy' => false]])
            ->hint('1 kg - 40 UAH')?>
    
       
        <?= $form->field($model, 'price') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- tickets-index -->
