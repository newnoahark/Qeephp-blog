<?php $this->_extends('../_layouts/admin_layout');?>
<title><?php $this->_block('titles')?>文章列表<?php $this->_endblock()?></title>
<?php $this->_block('links')?>
<link rel="stylesheet" href="<?php echo $_BASE_DIR?>lib/node_modules/datatables.net-bs/css/dataTables.bootstrap.css" type="text/css">
<link rel="stylesheet" href="<?php echo $_BASE_DIR?>lib/node_modules/toastr/build/toastr.css" type="text/css">
<?php $this->_endblock()?>
<?php $this->_block('container');?>
<div id="content-container">
    <ol class="breadcrumb">
        <li><a href="<?php echo url('default/index');?>">主页 <i class="fa fa-home"></i></a></li>
        <li class="active">文章列表 <i class="fa fa-cog"></i></li>
    </ol>
    <div class="page-title">
        <div class="caption">
            <h3><i class="fa fa-cog"></i>文章列表</h3>
        </div>
        <div class="action">
            <a href="<?php echo url('default/createposts');?>" class="btn btn-success">添加文章 <i class="fa fa-user"></i></a>
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
                                    <th>标题</th>
                                    <th>作者</th>
                                    <th>来源</th>
                                    <th>描述</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
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
<script>
    $(document).ready(()=>{
        var articlelistUrl = '<?php echo url('admin::categoryapi/articleapi');?>';
        var editPosts = '<?php echo url('admin::default/editposts')?>';
        var delPosts = '<?php echo url('admin::default/deleteposts')?>';

//        模拟数据
        $("#article-list").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "type" : "GET",
                "url" :articlelistUrl
            },
            "columnDefs": [ {
                "targets": -1,   //加到最后一个
                "data": null, // 空的数据源
                "render": function ( data, type, full, meta ) {
//                    渲染
                    dataId = data[0];
                    return '<a class="btn btn-xs btn-primary tooltips" href="'+editPosts+"&id="+data[0]+'" data-toggle="tooltip" data-placement="top" data-articleid="'+data[0]+'" title="编辑"><i class="fa fa-edit"></i></a>'+ '<a href="javascript:void(0);"  class="btn btn-xs btn-danger tooltips" data-toggle="tooltip" data-placement="top" data-articleid="'+data[0] +'" title="删除"><i class="fa fa-trash"></i><form method="post" style="display: none"></form></a>';
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
        $('#article-list tbody').on('click','a.btn-danger',function (e) {
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:delPosts+'&id='+$(this).attr('data-articleid')
            }).done(function(data,textStatus,jqXHR){
                console.log(textStatus);
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
                        window.location.href = '<?php echo url('admin::default/articlelist')?>';
                    },3000);
                }
            }).fail(function(jqXHR,textStatus,errorThrow){
                if(errorThrow) {
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 500
                        };
                        toastr.error('删除错误!!!!!!');
                        window.location.href = '<?php echo url('admin::default/articlelist')?>';
                    }, 3000);

                }
            });
        });
    });
</script>
<?php $this->_endblock();?>
