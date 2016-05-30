<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
    <?php $this->registerMetaTag(['name' => 'keywords', 'content' => \common\models\Config::get('SEO_SITE_KEYWORDS')]);?>
    <?php $this->registerMetaTag(['name' => 'description', 'content' => \common\models\Config::get('SEO_SITE_DESCRIPTION')]);?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header class="dc-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1 dc-header-pane">
                <div class="dc-header-container">
                    <nav class="navbar navbar-default dc-header-nav">
                        <a class="dc-nav-pane-logo" href="#">
                            <img alt="logo" src="/img/logo.png">
                        </a>

                        <div class="dc-nav-menu-pane" id="dc-header">

                            <?php
                            NavBar::begin([
                                'options' => [
                                    'class' => 'navbar-btn dc-nav-user-btn'
                                ],
                            ]);
                            $rightMenuItems = [];
                            //    $rightMenuItems[] = ['label' => '投稿', 'url' => ['/my/create-article']];
                            if (Yii::$app->user->isGuest) {
                                $rightMenuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']];
                                $rightMenuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
                            } else {
                                $rightMenuItems[] = [
                                    'label' => Yii::$app->user->identity->username,
                                    'items' => [
                                        [
                                            'label' => '我的收藏',
                                            'url' => ['/my/article-list'],
                                        ],
                                        [
                                            'label' => '退出',
                                            'url' => ['/site/logout'],
                                            'linkOptions' => ['data-method' => 'post'],
                                        ],
                                    ],
                                ];
                            }
                            echo Nav::widget([
                                'options' => ['class' => 'navbar-nav'],
                                'items' => $rightMenuItems,
                            ]);
                            NavBar::end();
                            ?>
                        </div>
                    </nav>

                    <div class="hidden-xs dc-header-menus-pane">
                        <?php
                        NavBar::begin([
                            'options' => [
                                'class' => 'dc-header-menus-box',
                            ],
                        ]);
                        $menuItems = [];
                        $menuItems[] = ['label' => '首页', 'url' => Yii::$app->homeUrl];
                        foreach (\common\models\Category::find()->all() as $nav) {
                            $menuItems[] = ['label' => $nav['title'], 'url' => ['/article/index', 'cate' => $nav['name']]];
                        }
                        foreach (\common\models\Nav::find()->all() as $nav) {
                            $menuItems[] = ['label' => $nav['title'], 'url' => $nav['route']];
                        }
                        echo Nav::widget([
                            'options' => ['class' => 'navbar-nav'],
                            'items' => $menuItems,
                        ]);
                        NavBar::end();
                        ?>
                    </div>


                    <ul class="dc-header-ads-pane">
                        <li class="dc-header-ads-item"><a href="#"><img class="img-responsive img" src="/img/a1.png"
                                                                        alt=""/></a></li>
                        <li class="dc-header-ads-item"><a href="#"><img class="img-responsive img" src="/img/a2.png"
                                                                        alt=""/></a></li>
                        <li class="dc-header-ads-item"><a href="#"><img class="img-responsive img" src="/img/a3.png"
                                                                        alt=""/></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>


<?php
//NavBar::begin([
//    'options' => [
//        'class' => 'navbar-inverse navbar-static-top',
//    ],
//]);
//$menuItems = [];
//$menuItems[] = ['label' => '首页', 'url' => Yii::$app->homeUrl];
//foreach (\common\models\Category::find()->all() as $nav) {
//    $menuItems[] = ['label' => $nav['title'], 'url' => ['/article/index', 'cate' => $nav['name']]];
//}
//foreach (\common\models\Nav::find()->all() as $nav) {
//    $menuItems[] = ['label' => $nav['title'], 'url' => $nav['route']];
//}
//echo Nav::widget([
//    'options' => ['class' => 'navbar-nav'],
//    'items' => $menuItems,
//]);
//$rightMenuItems = [];
////    $rightMenuItems[] = ['label' => '投稿', 'url' => ['/my/create-article']];
//if (Yii::$app->user->isGuest) {
//    $rightMenuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup'], 'options' => ['class' => 'pull-right']];
//    $rightMenuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
//} else {
//    $rightMenuItems[] = [
//        'label' => Yii::$app->user->identity->username,
//        'items' => [
//            [
//                'label' => '我的收藏',
//                'url' => ['/my/article-list'],
//            ],
//            [
//                'label' => '退出',
//                'url' => ['/site/logout'],
//                'linkOptions' => ['data-method' => 'post'],
//            ],
//        ],
//    ];
//}
//echo Nav::widget([
//    'options' => ['class' => 'navbar-nav navbar-right'],
//    'items' => $rightMenuItems,
//]);
//NavBar::end();
//?>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"><a href="<?= \yii\helpers\Url::to(['/page?id=1'])?>" target="_blank">免责声明</a></div>
            <div class="col-sm-3"><a href="<?= \yii\helpers\Url::to(['/page?id=2'])?>" target="_blank">关于我们</a></div>
<!--            <div class="col-sm-3"><a href="--><?//= \yii\helpers\Url::to(['/suggest/create'])?><!--" target="_blank">问题反馈</a></div>-->
<!--            <div class="col-sm-3"><a href="https://github.com/yidashi/yii" target="_blank">获取源码</a></div>-->
        </div>
    </div>
    <hr/>
    <div class="container">
        <p class="pull-left">&copy; <?= \common\models\Config::get('SITE_NAME').' '.date('Y') ?></p>
        <p class="pull-right"><?= \common\models\Config::get('SITE_ICP')?></p>
    </div>
</footer>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>
<a class="back-to-top btn btn-default" style="display: none;"><span class="fa fa-arrow-up"></span></a>
<?php if (YII_ENV_PROD):?>
<!--页脚-->
<?= \common\models\Config::get('FOOTER')?>
<?php endif; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
