<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Flights;



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
    //'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
    
    <?= $form->field($passengers, 'age') ?>
       
        <?= $form->field($model, 'price') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- tickets-index -->
