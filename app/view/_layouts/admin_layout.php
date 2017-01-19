<!DOCTYPE html>
<html>
<head>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="keep_wan">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0" />
    <title><?php $this->_block('titles');?><?php $this->_endblock();?></title>
<!--    google 字体-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<!--    boostrap-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR?>lib/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR?>lib/node_modules/font-awesome/css/font-awesome.css">
    <!--    主题样式-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR?>css/admin-css/nifty.css">
<!--    主题图标样式-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR?>css/admin-css/nifty-demo-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR?>css/admin-css/nifty-demo.css">
<!--    进度条效果-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR?>lib/pace/themes/pink/pace-theme-minimal.css">
<!--    自定义样式-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR;?>css/admin-css/cutomer.css">
    <?php $this->_block('links')?><?php $this->_endblock()?>
</head>
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
<!--        头部-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">
<!--                logo-->
                <div class="navbar-header">
                    <a href="<?php echo url('admin::default/index');?>" class="navbar-brand">
                        <img src="<?php echo $_BASE_DIR?>img/21-160P3233605.jpg" alt="博客logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">我的博客</span>
                        </div>
                    </a>
                </div>
                <div class="navbar-content clearfix">
                    <ul class="nav navbar-top-links pull-left">
                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-view-list"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-top-links pull-right">

                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right">
                                    <!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->
                                    <i class="demo-pli-male ic-user"></i>
                                </span>
                                <div class="username hidden-xs"><?php echo $user['name'];?></div>
                            </a>


                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">
                                <!-- User dropdown menu -->
                                <ul class="head-list">
                                    <li>
                                        <a href="<?php echo url("default::default/about")?>">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> 个人信息
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <span class="label label-success pull-right">新</span>
                                            <i class="demo-pli-gear icon-lg icon-fw"></i>设置
                                        </a>
                                    </li>
                                </ul>
                                <!-- Dropdown footer -->
                                <div class="pad-all text-right">
                                    <a href="<?php echo url('default/signout')?>" class="btn btn-primary">
                                        <i class="demo-pli-unlock"></i>注销
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->
                    </ul>
                </div>
            </div>
        </header>
        <div class="boxed">
            <?php $this->_block('container');?><?php $this->_endblock();?>
            <nav id="mainnav-container">
                <div id="mainnav">

                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">
                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap">
                                        <div class="pad-btm">
                                            <span class="label label-success pull-right">用户</span>
                                            <img class="img-circle img-sm img-border" src="<?php echo $_BASE_DIR?>img/psb.jpg" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name"><?php echo $user['name']?></p>
                                            <span class="mnp-desc"><?php echo $user['email']?></span>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> 显示个人信息
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-gear icon-lg icon-fw"></i> 设置
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> 注销
                                        </a>
                                    </div>
                                </div>
                                <ul id="mainnav-menu" class="list-group">

                                    <!--Category name-->
                                    <li class="list-header">导航</li>

                                    <!--Menu list item-->
                                    <li class="active-link">
                                        <a href="<?php echo url('default/index');?>">
                                            <i class="demo-psi-home"></i>
                                            <span class="menu-title">
												<strong>控制台</strong>
											</span>
                                        </a>
                                    </li>

                                    <!--Menu list item-->
                                    <li>
                                        <a href="javascript:void();"  class="collapsed">
                                            <i class="demo-psi-split-vertical-2"></i>
                                            <span class="menu-title">
												<strong>文章管理</strong>
											</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse" >
                                            <li><a href="<?php echo url('default/articlelist');?>">文章列表 <i class="fa fa-list"></i></a></li>
                                            <li><a href="<?php echo url('default/CategoryList');?>">文章分类 <i class="fa fa-clone"></i></a></li>
                                        </ul>
                                    </li>

                                    <!--Menu list item-->
                                    <li>
                                        <a href="#" class="collapsed">
                                            <i class="fa fa-image"></i>
                                            <span class="menu-title">
												<strong>图片管理</strong>
											</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <ul class="collapse">
                                            <li><a href="<?php echo url('default/upload')?>">图片上传<i class="fa fa-cloud"></i></a></li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->
                </div>
            </nav>
<!--            页脚-->
            <footer id="footer">

                <!-- Visible when footer positions are fixed -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="show-fixed pull-right">
                    You have <a href="#" class="text-bold text-main"><span class="label label-danger">3</span> pending action.</a>
                </div>



                <!-- Visible when footer positions are static -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="hide-fixed pull-right pad-rgt">
                    <span>主题</span>
                </div>

                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <p class="pad-lft">&#0169; 创建于2016年</p>

            </footer>
<!--            回到顶部-->
            <button class="scroll-top btn">
                <i class="pci-chevron chevron-up"></i>
            </button>
        </div>
    </div>
    <script src="<?php echo $_BASE_DIR?>lib/node_modules/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $_BASE_DIR?>lib/node_modules/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<!--    加载页面进度条-->
    <script src="<?php echo $_BASE_DIR?>lib/pace/pace.min.js" type="text/javascript"></script>
<!--    主题js-->
<!--    滚动条插件-->
    <script src="<?php echo $_BASE_DIR?>lib/jquery.nicescroll.js" type="text/javascript"></script>
<!--  主题js  -->
    <script src="<?php echo $_BASE_DIR?>js/admin-js/nifty.js"></script>
    <script src="<?php echo $_BASE_DIR?>js/admin-js/app.js"></script>
    <?php $this->_block('scripts');?><?php $this->_endblock() ?>
</body>
</html>