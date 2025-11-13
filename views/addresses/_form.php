<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Addresses $model */
/** @var yii\widgets\ActiveForm $form */

$states = \app\models\States::find()->all();
$states = \yii\helpers\ArrayHelper::map($states, 'ID', 'Name');
$cidades = \app\models\Cities::find()->all();

$cidades = array_map(fn($m) => $m->attributes, $cidades)
?>


<div class="addresses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Street')->textInput([
        'maxlength' => true,
        'class' => 'form-control rounded-pill',
    ]) ?>

    <?= $form->field($model, 'Number')->textInput([
        'maxlength' => true,
        'class' => 'form-control rounded-pill',
    ]) ?>

    <?= $form->field($model, 'CEP')->textInput([
        'maxlength' => true,
        'type' => 'number',
        'class' => 'form-control rounded-pill'
    ]) ?>

    <div class="form-group">
        <label for="state" value="0">Selecione um estado</label>
        <?= Html::dropDownList('state', true, $states, [
            'id' => 'state',
            'prompt' => ['text' => 'Selecione um estado', 'options' => []],
            'class' => 'form-select rounded-pill',
            'required' => true,
            'options' => [
                '1' => ['selected' => false]
            ]
        ]) ?>
    </div>

    <?= $form->field($model, 'CityID')->dropDownList([], [
        'id' => 'model-cidade_id',
        'disabled' => 'true',
        'class' => 'form-select rounded-pill',
    ])->label('Cidades') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success rounded-pill']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <script>
        let cidades = JSON.parse('<?= json_encode($cidades); ?>')
        const stateEl = document.querySelector('#state')

        stateEl.addEventListener('change', e => {
            const cities = document.getElementById('model-cidade_id');

            let cidades2 = cidades.filter(x => x.StateID == stateEl.value)
            let options = '';

            cidades2.forEach(item => {
                options += `<option value=${item.ID}>${item.Name}</option>`;
            })

            cities.disabled = !stateEl.value;
            cities.innerHTML = options;
        })
    </script>

</div>
