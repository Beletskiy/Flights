<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Place */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="place-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'class')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'seat_num')->textInput() ?>

    <?= $form->field($model, 'free')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
