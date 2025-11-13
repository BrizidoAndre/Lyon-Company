<?php

use app\models\Benefits;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BenefitsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Benefits';
$this->params['breadcrumbs'][] = $this->title;
$model = new Benefits();
?>
<div class="benefits-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php $form = \yii\widgets\ActiveForm::begin(); ?>

    <?= $form->field($model, 'DiscountPercentage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DiscountTypeID')->textInput() ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Mandatory')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php \yii\widgets\ActiveForm::end(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'DiscountPercentage',
            'DiscountTypeID',
            'Name',
            'Mandatory',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Benefits $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
