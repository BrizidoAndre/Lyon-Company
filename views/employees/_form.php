<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Employees $model */
/** @var app\models\People $person */
/** @var yii\widgets\ActiveForm $form */

$cargos = \app\models\Roles::find()->all();
$cargos = \yii\helpers\ArrayHelper::map($cargos, 'ID', 'Name');
$responsavel = \app\models\Employees::find()->andWhere(['RoleID' => 2])->all();
foreach ($responsavel as $item) {
    $responsavelPerson = \app\models\People::findOne(['ID' => $item->ID]);
    $item->magicName = $responsavelPerson->Name;
}
$responsavel = \yii\helpers\ArrayHelper::map($responsavel, 'ID', 'magicName')
?>

<div class="employees-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--    people bv-->

    <?= $form->field($person, 'Name')->textInput([
        'maxlength' => true,
        'class' => 'form-control rounded-pill'
    ]) ?>

    <?= $form->field($person, 'BirthDay')->textInput([
        'type' => 'date',
        'max' => date('Y-m-d', strtotime('yesterday')),
        'class' => 'form-control rounded-pill'
    ]) ?>

    <?= $form->field($person, 'ResponsibleID')->dropDownList($responsavel, [
        'prompt' => 'Selecione um responsável',
        'class' => 'form-control rounded-pill'
    ])->label('Responsável') ?>

    <!--    employeee-->
    <?= $form->field($model, 'Email')->textInput([
            'maxlength' => true,
        'class' => 'form-control rounded-pill'
    ]) ?>

    <?= $form->field($model, 'Password')->passwordInput([
            'maxlength' => true,
        'class' => 'form-control rounded-pill'
    ]) ?>

    <?= $form->field($model, 'ConfirmPassword')->passwordInput([
            'maxlength' => true,
        'class' => 'form-control rounded-pill'
    ]) ?>

    <?= $form->field($model, 'RoleID')->dropDownList($cargos,[
            'class' => 'form-select rounded-pill'
    ])->label('Cargos') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success rounded-pill']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
