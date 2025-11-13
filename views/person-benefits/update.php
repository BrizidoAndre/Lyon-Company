<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PersonBenefits $model */

$this->title = 'Update Person Benefits: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Person Benefits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="person-benefits-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
