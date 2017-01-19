<!-- Navigation panel -->
<nav class="main-nav js-stick">
    <div class="full-wrapper relative clearfix">
        <!-- Logo ( * your text or image into link tag *) -->
        <div class="nav-logo-wrap local-scroll">
            <a href="<?php echo url('default/index')?>" class="logo">
                <h3>我的博客</h3>
            </a>
        </div>
        <div class="mobile-nav">
            <i class="fa fa-bars"></i>
        </div>

        <!-- Main Menu -->
        <div class="inner-nav desktop-nav">
            <ul class="clearlist">
                <!-- Item With Sub -->
                <li>
                    <a href="<?php echo url('default/index');?>" class="mn-has-sub">主页 <i class="fa fa-home"></i></a>

                </li>
                <li>
                    <a href="<?php echo url('default/photo');?>" class="mn-has-sub">相册 <i class="fa fa-picture-o"></i></a>

                </li>
                <li>
                    <a href="<?php echo url('default/rizhi');?>" class="mn-has-sub">日志 <i class="fa fa-edit"></i></a>

                </li>
                <li>
                    <a href="<?php echo url('default/liuyan');?>" class="mn-has-sub">留言板 <i class="fa fa-file-text"></i></a>

                </li>
                <li>
                    <a href="<?php echo url('default/info');?>" class="mn-has-sub">个人信息 <i class="fa fa-info"></i></a>

                </li>
                <!-- End Item With Sub -->

                <!-- Languages -->
                <li>
                    <a href="<?php echo url('default/login')?>" class="mn-has-sub"><?php if(isset($user['name'])):?><span><?php echo $user['name']?></span><?php else:?> <span>登入</span><?php endif;?><i class="fa fa-user"></i></a>
                    <ul class="mn-sub">
                        <li><a href="<?php echo url('default/signup')?>">注册 <i class="fa fa-firefox" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo url('default/signout')?>">注销 <i class="fa fa-sign-out"></i></a></li>
                    </ul>
                </li>
                <!-- End Languages -->

            </ul>
        </div>
        <!-- End Main Menu -->


    </div>
</nav>
<!-- End Navigation panel -->