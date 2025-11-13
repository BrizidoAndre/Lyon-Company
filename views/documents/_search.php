<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DocumentsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="documents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'PersonID') ?>

    <?= $form->field($model, 'DocTypeID') ?>

    <?= $form->field($model, 'Value') ?>

    <?= $form->field($model, 'IssueDate') ?>

    <?php // echo $form->field($model, 'ExpirationDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
