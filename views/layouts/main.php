<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex ">
<?php $this->beginBody() ?>

<header id="header" >
    <?php
    NavBar::begin([
        'options' => ['class' => 'navbar-expand navbar-dark bg-dark vh-100 px-5 sticky-top'],
        'innerContainerOptions' => [
            'class' => 'h-100'
        ],
        'containerOptions' => [
            'class' => 'd-flex flex-column justify-content-between h-100'
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav d-flex flex-column'],
        'items' => [
            ['label' => Html::img(\yii\helpers\BaseUrl::base(true) . '/assets/Logotipo/tmn-logo-fundo-escuro.png', [
                'style' => [
                    'width' => '200px',
                    'height' => '100px'
                ]
            ]), 'url' => Yii::$app->homeUrl],
            ['label' => 'Home', 'url' => ['/site/index'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Cadastro', 'url' => ['/employees/create'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Endereço', 'url' => ['/addresses/create', 'personId' => Yii::$app->user->identity->ID ?? null], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Documento', 'url' => ['/documents/create', 'personId' => Yii::$app->user->identity->ID ?? null], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Benefícios', 'url' => ['/person-benefits/index'], 'visible' => !Yii::$app->user->isGuest]
        ],
        'encodeLabels' => false
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav d-flex flex-column w-100'],
        'items' => [
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item text-danger">'
                . Html::beginForm(['/site/logout'])
                . Html::submitButton(
                    'Logout',
                    ['class' => 'nav-link btn btn-link logout text-start text-danger']
                )
                . Html::endForm()
                . '</li>'
        ],
    ]);
    //    echo '</div>';
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-grow-1" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
