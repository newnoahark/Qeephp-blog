<?php $this->_extends('../_layouts/admin_layout');?>
<title><?php $this->_block('titles')?>分类列表<?php $this->_endblock()?></title>
<?php $this->_block('links')?>
<link rel="stylesheet" href="<?php echo $_BASE_DIR?>lib/node_modules/datatables.net-bs/css/dataTables.bootstrap.css" type="text/css">
<link rel="stylesheet" href="<?php echo $_BASE_DIR?>lib/node_modules/toastr/build/toastr.css" type="text/css">
<link rel="stylesheet" href="<?php echo $_BASE_DIR;?>lib/node_modules/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" type="text/css">
<?php $this->_endblock()?>
<?php $this->_block('container');?>
<div id="content-container">
    <ol class="breadcrumb">
        <li><a href="<?php echo url('default/index');?>">主页 <i class="fa fa-home"></i></a></li>
        <li class="active">分类列表 <i class="fa fa-cog"></i></li>
    </ol>
    <div class="page-title">
        <div class="caption">
            <h3><i class="fa fa-cog"></i>分类列表</h3>
        </div>
        <div class="action">
            <a href="<?php echo url('default/creategateory');?>" class="btn btn-success">添加分类 <i class="fa fa-user"></i></a>
        </div>
    </div>
    <div id="page-content">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel">
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover" id="article-list">
                            <thead>
                                <tr>
                                    <th># id</th>
                                    <th>类型</th>
                                    <th>创建时间</th>
                                    <th>更新时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">修改类型 </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal"   id="edit_category" method="post">
                        <div class="panel-body">
                            <fieldset class="form-group">
                                <label for="demo-id" class="col-sm-3 control-label">id #</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="category-id" id="category-id">
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="demo-title" class="col-sm-3 control-label">类型名</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control"  name="category-name" id="category-name">
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="demo-title" class="col-sm-3 control-label">更新时间</label>
                                <div class="col-sm-7">
                                    <div class="input-group date "  data-date-format="yyyy MM dd - HH:ii p" >
                                        <input class="form-control"  type="text"  name="category-date" >
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <div class="col-sm-7 col-sm-offset-3">
                                    <button class="btn btn-success" type="submit" >保存</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                </div>
                            </fieldset>
                        </div
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $this->_endblock();?>
<?php $this->_block('scripts')?>
<!--表格插件-->
<script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/node_modules/datatables/js/jquery.dataTables.js"></script>
<!--databales bootstrap-->
<script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/node_modules/datatables.net-bs/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/node_modules/toastr/build/toastr.min.js"></script>
<script src="<?php echo $_BASE_DIR;?>lib/node_modules/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
<script src="<?php echo $_BASE_DIR;?>lib/node_modules/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js" type="text/javascript"></script>

<script>
    $(document).ready(()=>{
        var gorylistUrl = '<?php echo url('admin::categoryapi/categoryapi');?>';
        var editCateGory = '<?php echo url('admin::default/editcategory');?>';
        var removeCateGory  = '<?php echo url('admin::default/removecategory');?>';
//datatables 插件s
        $("#article-list").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "type" : "GET",
                "url" : gorylistUrl
            },
            "columnDefs": [ {
                "targets": -1,   //加到最后一个
                "data": null, // 空的数据源
                "render": function ( data, type, full, meta ) {
//                    渲染
                    dataId = data[0];
                    return '<a class="btn btn-xs btn-primary tooltips" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-goryid="'+data[0]+'" title="编辑"><i class="fa fa-edit"></i></a>'+ '<a href="javascript:void(0);"  class="btn btn-xs btn-danger tooltips" data-toggle="tooltip" data-placement="top" data-goryid="'+data[0] +'" title="删除"><i class="fa fa-trash"></i><form method="post" style="display: none"></form></a>';
            } }],
//            绘制回调函数
            "drawCallback": function( settings ) {
                $(this).find('.tooltips').tooltip( {
                    placement : 'top',
                    html : true
                });
            },
//            数据类型
            type:"json"
        });
//        ajax 删除
        $('#article-list tbody').on('click','a.btn-danger ',function () {
            $.ajax({
                type:"POST",
                url:removeCateGory+'&id='+$(this).attr('data-goryid')
            }).done(function(data,textStatus,jqXHR){
                if(textStatus === 'success')
                {
                    setTimeout(function(){
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 500
                        };
                        toastr.success('你已经成功删除了!!!!');
                        window.location.href = '<?php echo url('admin::default/categorylist')?>';
                    },3000);

                }
            }).fail(function(jqXHR,textStatus,errorThrow){
                if(errorThrow){
                    setTimeout(function(){
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 500
                        };
                        toastr.error('删除错误!!!!!!');
                        window.location.href = '<?php echo url('admin::default/categorylist')?>';
                    },3000);
                }
            });
        });
//        ajax 编辑
        $('#article-list tbody').on('click','a.btn-primary',function () {

            var id = $(this).attr('data-goryid');
//            初始化编辑表单数据
            var td = $(this).parents('tr').find('td');
            $('.form-group input:eq(0)').val(td.eq(0).text());
            $('.form-group input:eq(1)').val(td.eq(1).text());
            $('.form-group input:eq(2)').val(td.eq(3).text());
//            打开modal
            $('#editCategory').modal('toggle');
//            添加日期
            $('.form-group .date').datetimepicker({
                autoclose:true,
                weekStart: 1,
                todayBtn:  1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1
            });

            $('.modal').on('submit','form#edit_category',function () {
                $form = $(this);
                $.ajax({
                    cache:false,
                    type:"POST",
                    url:editCateGory+'&id='+id,
                    data:$(this).serialize(),
                    processData: false,
                }).done(function (data,textStatus,jqXHR) {
                    if(textStatus === 'success')
                    {
                        setTimeout(function () {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 500
                            };
                            toastr.success('编辑成功!!!!!!!!!!!!!!!!!!!!!');
                            window.location.href = '<?php echo url('admin::default/categorylist')?>';
                        },1000);
                    }
                   $('.modal').modal('hide');

                }).fail(function (jqXHR,textStatus,errorThrow) {
                    if(errorThrow)
                    {
                        setTimeout(function () {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 500
                            };
                            toastr.error('编辑失败!!!!!!!!!!!!!!!!!!!!!');
                            window.location.href = '<?php echo url('admin::default/categorylist')?>';
                        },3000);
                    }
                    $('.modal').modal('hide');
                });
                return false;
            });
        });
    });
</script>
<?php $this->_endblock();?>

