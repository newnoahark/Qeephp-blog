<?php
    $ctx = QContext::instance();
    $_BASE_DIR = $ctx->baseDir();
?>
<!doctype html>
<html>
    <head>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="author" content="keep_wan">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0" />
        <title>403访问拒绝页面</title>
        <link rel="stylesheet"  type="text/css" href="<?php echo $_BASE_DIR?>lib/node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR;?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR;?>css/style-responsive.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR?>css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR?>css/vertical-rhythm.min.css">
        <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="//cdn.bootcss.com/respond.js/1.4.1/respond.min.js"></script>
    </head>
    <body class="appear-animate">
    <div class="page-loader">
        <div class="loader">载入中...</div>
    </div>
    <div class="page" id="top">
        <section class="home-section bg-dark-alfa-50 parallax-2">
            <div class="js-height-full">

                <!-- 内容 -->
                <div class="home-content container">
                    <div class="home-text">
                        <div class="hs-cont">

                            <!-- 头 -->
                            <div class="hs-wrap">

                                <div class="hs-line-13 font-alt mb-10">
                                    403
                                </div>

                                <div class="hs-line-4 font-alt mb-40">
                                    访问被拒绝，请确定你有权限访问页面
                                </div>

                                <div class="local-scroll">
                                    <a href="<?php echo url('default::default/login');?>" class="btn btn-mod btn-w btn-round btn-small"><i class="fa fa-angle-left"></i> 返回登入页面</a>
                                </div>

                            </div>
                            <!-- End Headings -->
                        </div>
                    </div>
                </div>
                <!-- End Hero Content -->
            </div>
        </section>
        <nav class="main-nav dark transparent stick-fixed">
            <div class="full-wrapper relative clearfix">

                <div class="nav-logo-wrap local-scroll">
                    <a href="<?php echo url('default/index');?>" class="logo">
                        <h3>我的博客</h3>
                    </a>
                </div>
                <div class="mobile-nav">
                    <i class="fa fa-bars"></i>
                </div>
                <!-- Main Menu -->
                <div class="inner-nav desktop-nav">
                    <ul class="clearlist scroll-nav local-scroll">
                        <li class="active"><a href="mailto:support@bestlooker.pro"><i class="fa fa-envelope"></i> whevether@qq.com</a></li>
                        <li><a href="#"><i class="fa fa-phone"></i>13265616949</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <footer id="footer" class="page-section bg-gray-lighter footer pb60">
            <div class="container">
                <!--        页脚logo-->
                <div class="local-scroll mb-30 wow fadeInUp" data-wow-duration="1.5s">
                    <a href="#top"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcR5Rk7WL1inv7VCsjbRGjDxqMMHJ7_9qVVCbFc91akDKkHA_D_3" width="78" height="78" alt=""></a>
                </div>
                <!--        链接图标-->
                <div class="footer-social-links mb-110 mb-xs-60">
                    <a href="http://www.qq.com" data-toggle="tooltip" data-placement="top" title="qq"><i class="fa fa-qq"></i></a>
                    <a href="http://www.qq.wx.com" data-toggle="tooltip" data-placement="top" title="微信"><i class="fa fa-weixin"></i></a>
                    <a href="http://www.weibo.com" data-toggle="tooltip" data-placement="top" title="微博"><i class="fa fa-weibo"></i></a>
                </div>
                <div class="footer-text">
                    <div class="footer-copy font-alt">
                        <a href="#">&copy;万文峰 2016</a>
                    </div>
                    <div class="footer-made">
                        欢迎大家来交流
                    </div>
                </div>
                <div class="local-scroll">
                    <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                </div>
            </div>
            <footer/>
    </div>
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--  附贴导航菜单  -->
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/node_modules/jquery-sticky/jquery.sticky.js"></script>
    <!--    载入动画效果-->
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/imagesloaded.pkgd.min.js"></script>
    <!--    定位到滚动插件-->
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/jquery.scrollTo.min.js"></script>
    <!--    平滑过渡效果插件-->
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/jquery.easing.1.3.js"></script>
    <!--    缓动效果插件-->
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/node_modules/WOW/wow.min.js"></script>
    <!--    动画固定导航-->
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/node_modules/jquery.localscroll/jquery.localScroll.js"></script>
    <!--    滚动视图相对位置插件-->
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/jquery.viewport.min.js"></script>
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>js/common.js"></script>
    </body>
</html>

