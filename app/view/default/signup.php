<?php $this->_extends('_layouts/login_layout'); ?>

<?php $this->_block('title'); ?> 博客注册<?php $this->_endblock(); ?>

<?php $this->_block('contents'); ?>
<div class="cls-content">
    <div class="cls-content-sm panel">
        <div class="panel-body">
            <div class="mar-ver pad-btm">
                <h3 class="h4 mar-no">注册账户</h3>
                <p class="text-muted">注册你的博客账户</p>
            </div>

            <form action="<?php echo url('default/signup')?>" class="form-horizontal submit-login" method="post" name="login-admin">
                <fieldset class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" name="name"placeholder="你的昵称">
                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="input-group">
                        <input type="email" placeholder="输入邮箱" class="form-control" id="email" name="email">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="input-group">
                        <input type="password" placeholder="输入密码" class="form-control" id="password" name="password">
                        <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="input-group">
                        <input type="password" placeholder="确认密码" class="form-control" id="confirm_password" name="confirm_password">
                        <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">注册</button>
                </fieldset>
            </form>
        </div>
        <div class="pad-all">
            <a href="<?php echo url('default/index');?>" class="btn-link">返回首页</a>
            <div class="media pad-top bord-top">
                <div class="pull-right">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="微博" class="pad-rgt"><i class="fa fa-weibo"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="微信" class="pad-rgt"><i class="fa fa-weixin"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="QQ" class="pad-rgt"><i class="fa fa-qq"></i></a>
                </div>
                <div class="media-body text-left">
                    友情链接
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->_endblock('contents'); ?>
<?php $this->_block('scripts')?>
<script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/node_modules/jquery-validation/dist/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo $_BASE_DIR?>js/app.js"></script>
<?php $this->_endblock() ?>
