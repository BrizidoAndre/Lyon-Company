<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PersonBenefitsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="person-benefits-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'PersonID') ?>

    <?= $form->field($model, 'BenefitID') ?>

    <?= $form->field($model, 'CancelationDate') ?>

    <?= $form->field($model, 'Amount') ?>

    <?php // echo $form->field($model, 'Occurrence') ?>

    <?php // echo $form->field($model, 'SolicitationDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
