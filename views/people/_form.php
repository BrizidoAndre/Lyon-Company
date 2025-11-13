<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\People $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="people-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BirthDay')->textInput() ?>

    <?= $form->field($model, 'Photo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ResponsibleID')->textInput() ?>

    <?= $form->field($model, 'TypeID')->textInput() ?>

    <?= $form->field($model, 'AddressID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
