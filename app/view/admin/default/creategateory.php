<?php $this->_extends('../_layouts/admin_layout');?>
<title><?php $this->_block('titles')?>创建分类<?php $this->_endblock()?></title>
<?php $this->_block('links');?>
<!--时间插件-->
<link rel="stylesheet" href="<?php echo $_BASE_DIR;?>lib/node_modules/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" type="text/css">
<link rel="stylesheet" href="<?php echo $_BASE_DIR;?>lib/node_modules/sweetalert/dist/sweetalert.css" type="text/css">
<?php $this->_endblock();?>
<?php $this->_block('container');?>
<div id="content-container">
    <ol class="breadcrumb">
        <li><a href="<?php echo url('default/index');?>">主页 <i class="fa fa-home"></i></a></li>
        <li class="active">创建分类<i class="fa fa-cog"></i></li>
    </ol>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h3>创建分类</h3>
                    </div>
                </div>
                <form action="<?php echo url('default/creategateory');?>" class="form-horizontal" method="post" id="create_gateory">
                    <div class="panel-body">
                        <fieldset class="form-group">
                            <label for="demo-title" class="col-sm-3 control-label">类型名</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="类型名" name="category-name" id="category-name">
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="demo-title" class="col-sm-3 control-label">更新时间</label>
                            <div class="col-sm-5">
                                <div class="input-group date "  data-date-format="yyyy MM dd - HH:ii p" >
                                    <input class="form-control"  type="text"  name="category-date">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="col-sm-5 col-sm-offset-3">
                                <button class="btn btn-success" type="submit">创建</button>
                                <a href="<?php echo url("default/categorylist")?>" class="btn btn-default">取消</a>
                            </div>
                        </fieldset>
                    </div
                </form>

            </div>
        </div>
    </div>
</div>
<?php $this->_endblock();?>
<?php $this->_block('scripts');?>
<script src="<?php echo $_BASE_DIR;?>lib/node_modules/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
<script src="<?php echo $_BASE_DIR;?>lib/node_modules/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js" type="text/javascript"></script>
<script src="<?php echo $_BASE_DIR;?>lib/node_modules/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
<script src="<?php echo $_BASE_DIR;?>lib/node_modules/jquery-form/jquery.form.js" type="text/javascript"></script>
<script>
    function beforeSubmit(data,jqForm, options)
    {
        var leght = data.length;
        for(var i = 0;i<leght;i++)
        {
            if(data[i].value === undefined || data[i].value === "")
            {
                swal("错误!", "不能为空值", "error");
            }
        }
        return true;
    }
    function successSubmit(responseText, statusText, xhr, $form)
    {
        var resText = responseText;

        if(resText === "存在的分类")
        {
            sweetAlert({
                title:"错误提示!!",
                text:resText,
                type: "warning",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确定"
            },function(){
                $form.clearForm();
            });
        }else if(statusText == 'success')
        {
            swal("成功", "你成功创建了", "success")
        }

    }
    $(function () {
        $('.form-group .date').datetimepicker({
            autoclose:true,
            weekStart: 1,
            todayBtn:  1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
        var options = {
            type:"POST",
            dataType :'json',
            beforeSubmit:beforeSubmit,
            success:successSubmit,
            clearForm: true,
            resetForm: true,
            timeout:   3000
        };
//        异步提交表单
        $("#create_gateory").submit(function () {
            $(this).ajaxSubmit(options);
            return false;
        });
    });
</script>
<?php $this->_endblock();?>

