<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BenefitsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="benefits-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'DiscountPercentage') ?>

    <?= $form->field($model, 'DiscountTypeID') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'Mandatory') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
