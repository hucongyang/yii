<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->params['seoTitle'].'_'.Yii::$app->name;
?>
<main class="">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="dc-main-pane-title"><span>电子刊</span></h4>

                        <div class="row">
                            <?php foreach ($magazines as $item):?>
                                <div class="col-xs-6">
                                    <div class="dzk-pane-item">
                                        <a href="<?= \yii\helpers\Url::toRoute(['article/view', 'id' => $item['id']])?>" target="_blank">
                                            <img class="img-responsive img" src="<?= $item->cover?>" alt="<?= $item->title?>">
                                        </a>
                                        <p class="date"><?= date('Y年m月刊', $item->created_at) ?></p>

                                        <p class="data"><a href="#">过刊资料库 »</a></p>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>

                        <h4 class="dc-main-pane-title"><span>人气阅读</span></h4>

                        <?php foreach ($read as $item):?>
                        <div class="yd-pane-item">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="<?= \yii\helpers\Url::toRoute(['article/view', 'id' => $item['id']])?>" target="_blank">
                                        <img class="img-responsive img" src="<?= $item->cover?>" alt="<?= $item->title?>">
                                    </a>
                                </div>
                                <div class="col-sm-8">
                                    <h5 class="title"><a href="<?= \yii\helpers\Url::toRoute(['article/view', 'id' => $item['id']])?>">
                                        <?= $item['title']?></a>
                                    </h5>

                                    <p class="content">
                                        继“11天威MTN1”年初确认实质违约后，本周保定天威集团有限公司再度发布公告，称因公司持续亏损，资金枯竭.
                                    </p>

                                    <!-- JiaThis Button BEGIN -->
                                    <div class="jiathis_style">
                                        <span class="jiathis_txt">分享到：</span>
                                        <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
                                    </div>
                                    <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
                                    <!-- JiaThis Button END -->
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>

                    <div class="col-sm-4">
                        <div class="search-pane"><input type="text" placeholder="请输入关键词"/><em></em></div>
                        <h4 class="dc-main-pane-title"><span>市场动态</span></h4>
                        <ul class="market-pane-ul">
                            <?php foreach ($read as $item):?>
                            <li class="market-pane-item">
                                <p class="title">
                                    <a href="<?= \yii\helpers\Url::toRoute(['article/view', 'id' => $item['id']])?>" target="_blank">
                                        <?= $item->title?>
                                    </a>
                                </p>

                                <p class="desc"><a href="#">中国人民银行定于2016年1月16日发行2016年贺岁普通纪念币一枚，该普通纪念币面额为10元</a></p>
                            </li>
                            <?php endforeach;?>
                        </ul>
                        <h4 class="dc-main-pane-title"><span>友情链接</span></h4>

                        <div class="link-pane-item">
                            <a href="#"><img class="img-responsive img" src="img/link01.jpg" alt="友情链接"/></a>
                        </div>
                        <div class="link-pane-item">
                            <a href="#"><img class="img-responsive img" src="img/link02.jpg" alt="友情链接"/></a>
                        </div>
                        <div class="link-pane-item">
                            <a href="#"><img class="img-responsive img" src="img/link03.jpg" alt="友情链接"/></a>
                        </div>
                        <div class="link-pane-item">
                            <a href="#"><img class="img-responsive img" src="img/link04.jpg" alt="友情链接"/></a>
                        </div>
                        <div class="link-pane-item">
                            <a href="#"><img class="img-responsive img" src="img/link05.jpg" alt="友情链接"/></a>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</main>
