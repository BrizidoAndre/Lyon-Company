<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PeopleSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="people-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'BirthDay') ?>

    <?= $form->field($model, 'Photo') ?>

    <?= $form->field($model, 'ResponsibleID') ?>

    <?php // echo $form->field($model, 'TypeID') ?>

    <?php // echo $form->field($model, 'AddressID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
