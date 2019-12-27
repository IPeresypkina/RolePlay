<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlotAndSession */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plot-and-session-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'plot')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'session')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
