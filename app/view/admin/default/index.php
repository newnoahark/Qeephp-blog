<?php $this->_extends('../_layouts/admin_layout');?>
<title><?php $this->_block('titles')?>博客后台<?php $this->_endblock()?></title>
<?php $this->_block('links')?>
    <link rel="stylesheet" href="<?php echo $_BASE_DIR?>lib/node_modules/datatables.net-bs/css/dataTables.bootstrap.css" type="text/css">
<?php $this->_endblock()?>
<?php $this->_block("container");?>
    <div id="content-container">
        <div id="page-title">
            <h1 class="page-header text-overflow">控制台</h1>
            <!--Searchbox-->
            <div class="searchbox">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="查找">
                    <span class="input-group-btn">
                        <button class="text-muted" type="button"><i class="demo-pli-magnifi-glass"></i></button>
                    </span>
                </div>
            </div>
        </div>
        <div id="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                               <h3 class="panel-title">文章状态</h3>
                        </div>
                        <div class="panel-body">
                            <div class="pad-btm form-inline">
                                <div class="row">
                                    <div class="col-sm-6 table-toolbar-left">
                                        <button class="btn btn-purple">
                                            <i class="demo-pli-add icon-fw">
                                            </i>
                                            添加
                                        </button>
                                        <button class="btn btn-default">
                                            <i class="demo-pli-printer"></i>
                                            打印
                                        </button>
                                        <button class="btn btn-default">
                                            <i class="demo-pli-information"></i>
                                            信息
                                        </button>
                                    </div>
                                    <div class="col-sm-6 table-toolbar-right">
                                        <div class="form-group">
                                            <input type="text" class="form-control" autocomplete="off" id="demo-input-serarch2">
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-default">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="table-responsive" >
                                <table class="table table-striped" id="table-dshboard">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>访客</th>
                                            <th>错误记录</th>
                                            <th>bug数量</th>
                                            <th>维护记录</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $this->_endblock('container');?>
<?php $this->_block('scripts')?>
<!--表格插件-->
<script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/node_modules/datatables/js/jquery.dataTables.js"></script>
<!--databales bootstrap-->
<script type="text/javascript" src="<?php echo $_BASE_DIR?>lib/node_modules/datatables.net-bs/js/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(()=>{
//        模拟数据
        $("#table-dshboard").DataTable({
           "ajax":"./users.json",
            "type":"json"
        });
    });
</script>
<?php $this->_endblock();?>
