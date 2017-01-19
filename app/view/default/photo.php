<?php $this->_extends('_layouts/default_layout'); ?>
<?php $this->_block('title'); ?>相册展示<?php $this->_endblock(); ?>
<?php $this->_block('links');?>
    <link rel="stylesheet" href="<?php echo $_BASE_DIR?>css/main.css" type="text/css">
<link rel="stylesheet" href="<?php echo $_BASE_DIR;?>lib/lightbox/lightbox.css" type="text/css">
<?php $this->_endblock()?>
<?php $this->_block('contents'); ?>
<div class="container relative">
    <!-- Photo Grid -->
    <div class="row multi-columns-row mb-30 mb-xs-10">
        <?php foreach ($photos as $photo):?>
        <div class="col-md-6 col-lg-6 mb-md-10">
            <div class="post-prev-img">
                <a href="<?php echo $_BASE_DIR.$photo['path'] ?>" data-lightbox="<?php echo $photo['user_id'] ?>" data-title="<?php echo $photo['username']?>">
                    <img src="<?php echo $_BASE_DIR.$photo['path'] ?>" alt="<?php echo $photo['username'] ?>">
                </a>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    <div class="row">
        <div class="img-pagebtn"><?php echo $paginator ?></div>
    </div>
</div>
<?php $this->_endblock('contents'); ?>
<?php $this->_block('scripts');?>
<script src="<?php echo $_BASE_DIR;?>lib/lightbox/lightbox.js" type="text/javascript"></script>
<?php $this->_endblock('scripts');?>
