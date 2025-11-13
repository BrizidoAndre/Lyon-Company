<?php

use app\models\PersonBenefits;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PersonBenefitsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Person Benefits';
$this->params['breadcrumbs'][] = $this->title;
$model = new PersonBenefits();
$benefits = \app\models\Benefits::find()->all();
$benefits = \yii\helpers\ArrayHelper::map($benefits, 'ID', 'Name')
?>
<div class="person-benefits-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = \yii\widgets\ActiveForm::begin([
        'action' => ['person-benefits/create']
    ]); ?>

    <div class="d-none">
        <?= $form->field($model, 'PersonID',)->hiddenInput(['value' => Yii::$app->user->identity->ID ?? null]) ?>
        <?= $form->field($model, 'SolicitationDate')->hiddenInput(['value' => date('Y:m:d')]) ?>
    </div>

    <?= $form->field($model, 'BenefitID')->dropDownList($benefits,[
            'prompt' => ['text' => 'Selecione um benefício', 'selected' => true, 'options' =>[]],
    ])->label('Benefício') ?>

    <?= $form->field($model, 'Amount')->textInput(['maxlength' => true, 'type' => 'number']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php \yii\widgets\ActiveForm::end(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label' => 'Benefício',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->benefit->Name;
                }
            ], [
                'attribute' => 'SolicitationDate',
                'label' => 'Registro',
                'format' => 'date'
            ], [
                'label' => 'Desconto',
                'value' => function ($model) {
                    return $model->benefit->DiscountPercentage . '%';
                }
            ], [
                'attribute' => 'Amount',
                'format' => 'currency',
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PersonBenefits $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                },
                'template' => '{delete}'
            ],
        ],
    ]); ?>


</div>
