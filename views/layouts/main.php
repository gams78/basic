<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('app', 'YII2 test application'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
	$navItems=[
		['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
		['label' => Yii::t('app', 'Say'), 'url' => ['/site/say']],
		['label' => Yii::t('app', 'Status'), 'url' => ['/status/index']],
		['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
		['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']]
	  ];
	  if (Yii::$app->user->isGuest) {
		array_push($navItems,
			['label' => Yii::t('user', 'Sign In'), 'url' => ['/user/login']],
			['label' => Yii::t('user', 'Sign Up'), 'url' => ['/user/register']]
		);
	  } else {
		array_push($navItems,	
			['label' => Yii::$app->user->identity->username, 'url' => ['/user/settings/account'], 'linkOptions' => ['data-method' => 'post']],
			['label' => Yii::t('user', 'Logout'), 'url' => ['/user/logout'], 'linkOptions' => ['data-method' => 'post']]
		);
	  }
	echo Nav::widget([
		'options' => ['class' => 'navbar-nav navbar-right'],
		'items' => $navItems,
	]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; TRI-ING d.o.o. Maribor <?= date('Y') ?></p>

        <!--p class="pull-right"><?= Yii::powered() ?></p-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
