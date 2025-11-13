<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PersonBenefits $model */

$this->title = 'Create Person Benefits';
$this->params['breadcrumbs'][] = ['label' => 'Person Benefits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-benefits-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
