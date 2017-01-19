<?php $this->_extends('../_layouts/admin_layout');?>
<title><?php $this->_block('titles')?>图片上传<?php $this->_endblock()?></title>
<?php $this->_block('links')?>
<link rel="stylesheet" href="<?php echo $_BASE_DIR?>lib/bootstrap-files/css/fileinput.css" type="text/css">
<?php $this->_endblock()?>
<?php $this->_block("container");?>
    <div id="content-container">
        <ol class="breadcrumb">
            <li><a href="<?php echo url('default/index')?>">主页 <i class="fa fa-home"></i></a></li>
            <li class="active">上传图片<i class="fa fa-cog"></i></li>
        </ol>
        <div id="page-title">
            <h1 class="page-header text-overflow">上传图片 <i class="fa fa-upload"></i></h1>
        </div>
        <div id="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                               <h3 class="panel-title">上传图片</h3>
                        </div>
                        <div class="panel-body">
                            <form action="" class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label for="username" class="col-sm-3 control-label">用户名</label>
                                    <div class="col-sm-5">
                                        <input id="username" name="username" type="text" class="form-control" placeholder="输入你的用户名" value="<?php echo $user['name']?>">
                                        <input type="hidden" name="userid" value="<?php echo $user['id']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="images[]" id="images" multiple  class="file-loading form-control">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->_endblock('container');?>
<?php $this->_block('scripts')?>
<script src="<?php echo $_BASE_DIR ?>lib/bootstrap-files/js/fileinput.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
//        提交地址
        var upload = '<?php echo url('admin::default/uploadimg')?>';
        $("#images").fileinput({
            uploadUrl:upload,
            maxFileCount:10,  //最大上传数
            maxFileSize: 1500,   //文件最大大小
            showBorowe:true,
            browseOnZoneClick:true,
            uploadAsync:true,//是否异步
//            上传扩展数据  用户id 和用户名
            uploadExtraData:function () {
                 return{
                     userid:$('input[name="userid"]').val(),
                     username:$('input[name="username"]').val()
                 };
             }
        });

    });

</script>
<?php $this->_endblock();?>
