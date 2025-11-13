<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Benefits $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="benefits-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DiscountPercentage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DiscountTypeID')->textInput() ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Mandatory')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
