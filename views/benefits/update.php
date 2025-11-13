<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Benefits $model */

$this->title = 'Update Benefits: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Benefits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="benefits-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
