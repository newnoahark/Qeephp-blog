<!DOCTYPE html>
<html>
<head>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="keep_wan">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0" />
    <title><?php $this->_block('title'); ?><?php $this->_endblock(); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR; ?>lib/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR;?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR;?>css/style-responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR?>css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR?>css/vertical-rhythm.min.css">
    <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.1/respond.min.js"></script>
    <?php $this->_block('links');?><?php $this->_endblock();?>
</head>
<body class="appear-animate">
<!--页面载入动画-->
<div class="page-loader">
    <div class="loader">
        载入中......
    </div>
</div>
<div class="page" id="top">

  <?php $this->_element('nav'); ?>
  <section id="content" class="page-section">

    <?php $this->_block('contents'); ?><?php $this->_endblock(); ?>

  </section>
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
                <a href="#">&copy 万文峰2016</a>
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
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/node_modules/wow/wow.min.js"></script>
<!--    动画固定导航-->
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/node_modules/jquery.localscroll/jquery.localScroll.js"></script>
<!--    滚动视图相对位置插件-->
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/jquery.viewport.min.js"></script>
    <script type="text/javascript" src="<?php echo $_BASE_DIR?>js/common.js"></script>
    <?php $this->_block('scripts');?><?php $this->_endblock() ?>
</body>
</html>
