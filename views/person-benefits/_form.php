<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PersonBenefits $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="person-benefits-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PersonID')->textInput() ?>

    <?= $form->field($model, 'BenefitID')->textInput() ?>

    <?= $form->field($model, 'CancelationDate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Occurrence')->textInput() ?>

    <?= $form->field($model, 'SolicitationDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
