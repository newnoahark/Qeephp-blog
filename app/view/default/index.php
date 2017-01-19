<?php $this->_extends('_layouts/default_layout'); ?>
<?php $this->_block('title'); ?>博客主页<?php $this->_endblock(); ?>
<?php $this->_block('links');?>
    <link rel="stylesheet" href="<?php echo $_BASE_DIR?>css/main.css" type="text/css">
<?php $this->_endblock()?>
<?php $this->_block('contents')?>
    <div class="container relative">
        <div class="col-sm-8">
            <div class="row multi-columns-row">
                <?php if (count($colles) == 0) :?>
                    <div class="alert alert-danger alert-dismissible fade in">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <strong>错误!</strong> 没有数据
                    </div>
                <?php endif;?>
                <?php foreach($colles as $i):?>
                    <?php if($i['status'] == 1):?>
                        <div class="col-md-6 col-lg-6 mb-60 mb-xs-40">
                            <div class="post-prev-img">
                                <a href="<?php echo url('default/articlecontent',array('id'=>$i['id']))?>"><img src="<?php echo $i['thumb']?>" alt="<?php echo $i['title']?>"></a>
                            </div>
                            <div class="post-prev-title font-alt">
                                <a href="<?php echo url('default/articlecontent',array('id'=>$i['id']))?>"><?php echo $i['title']?></a>
                            </div>
                            <div class="post-prev-info font-alt">
                                <a href="<?php echo url('default/articlecontent',array('id'=>$i['id']))?>">作者: <?php echo $i['author'] ?></a>
                            </div>
                            <div class="post-prev-text">
                                <ul >
                                    <li>
                                        <span>浏览数: <i class="fa fa-user"></i><?php echo $i['view_count'] ?></span>
                                    </li>
                                    <li>
                                        <span>创建时间:<i class="fa fa-calendar"></i><?php echo $i['create_at']?></span>
                                    </li>
                                    <li>
                                        <span>类型:<i class="fa fa-book"></i><?php $a =  Articlecategorys::find('id=?',$i['category_id'])->getOne(); echo $a['name'];?></span>
                                    </li>
                                    <li>
                                        <a href="<?php echo url('default/articlecontent',array('id'=>$i['id']))?>" class="btn btn-mod btn-round  btn-small">阅读全文</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif;?>
                    <?php if($i['status'] ==0):?>
                    <div class="alert alert-danger alert-dismissible fade in">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <strong>错误!</strong> 文章没有通过审核
                    </div>
                    <?php endif;?>
                <?php endforeach;?>
<!--                分页按钮-->
            </div>
            <div class="row">
                <?php echo $paginator;?>
            </div>
        </div>
        <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
            <?php $this->_element('sidebar')?>
        </div>
    </div>
<?php $this->_endblock('contents')?>