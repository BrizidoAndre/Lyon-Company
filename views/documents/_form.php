<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Documents $model */
/** @var yii\widgets\ActiveForm $form */

$modelLabel = [
    'RG',
    'CPF',
    'Passaporte',
    'Reservista',
];
$required = [
    'maxlength' => true,
    'required' => true,
];
function addRequired($usualArray, $i)
{
    if ($i === 0 || $i === 1) {
        $usualArray += ['required' => 'true'];
    }
    return $usualArray;
}
?>

<div class="documents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php for ($i = 0; $i < 4; $i++) : ?>

        <?php ?>

        <?= $form->field($model, "[$i]PersonID", [
            'options' => [
                'class' => 'd-none'
            ]
        ])->hiddenInput(['value' => $personId])->label('') ?>

        <?= $form->field($model, "[$i]DocTypeID", [
            'options' => [
                'class' => 'd-none'
            ]
        ])->hiddenInput(['value' => $i + 1])->label('') ?>

        <?= $form->field($model, "[$i]Value")->textInput(addRequired(['maxlength' => true], $i))->label($modelLabel[$i]) ?>

        <?= ($form->field($model, "[$i]IssueDate")->textInput(addRequired(['type' => 'date', 'max' => date('Y-m-d')], $i))->label('Data de expedição')) ?>

        <?= $i!== 1 && $i !== 3 ?  $form->field($model, "[$i]ExpirationDate")->textInput(addRequired(['type' => 'date', 'min' => date('Y-m-d')], $i))->label('Data de vencimento') : '' ?>

    <?php endfor ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
