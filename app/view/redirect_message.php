<!--错误提示页面-->
<?php $this->_extends('_layouts/login_layout') ?>
<?php $this->_block('title'); ?> 消息提示页<?php $this->_endblock(); ?>
<?php $this->_block('contents'); ?>
    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">
                <h1><?php echo $message_caption; ?></h1>
                <p>
                    <?php echo nl2br(h($message_body)); ?>
                </p>
                <a href="<?php echo url('default/login')?>" class="btn btn-primary">返回登入页</a>
                </p>
            </div>
        </div>
    </div>
<?php $this->_endblock(); ?>
<?php $this->_block('scripts');?>
<script type="text/javascript">
    setTimeout(function(){
        window.location.href = '<?php echo $redirect_url?>'
    },10000);
</script>
<?php $this->_endblock();?>
