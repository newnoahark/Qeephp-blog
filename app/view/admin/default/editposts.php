<?php $this->_extends('../_layouts/admin_layout');?>
<title><?php $this->_block('titles')?>编辑文章<?php $this->_endblock()?></title>
<?php $this->_block('links');?>
<!--文章编辑器插件-->
<link rel="stylesheet" href="<?php echo $_BASE_DIR?>lib/node_modules/editor.md/css/editormd.css" type="text/css">
<link rel="stylesheet" href="<?php echo $_BASE_DIR?>lib/node_modules/sweetalert/dist/sweetalert.css" type="text/css">
<link rel="stylesheet" href="<?php echo $_BASE_DIR?>lib/node_modules/select2/dist/css/select2.css" type="text/css">
<link rel="stylesheet" href="<?php echo $_BASE_DIR?>lib/check/magic-check.min.css" type="text/css">
<?php $this->_endblock();?>
<?php $this->_block('container');?>
<div id="content-container">
    <ol class="breadcrumb">
        <li><a href="<?php echo url('default/index');?>">主页 <i class="fa fa-home"></i></a></li>
        <li class="active">创建文章 <i class="fa fa-cog"></i></li>
    </ol>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h3>创建文章</h3>
                    </div>
                </div>
                <?php foreach ($editlist as $one):?>
                <form action="<?php echo url('default/editposts',array('id'=>$one['id']));?>" class="form-horizontal" method="post" id="create_article">

                    <div class="panel-body">

                        <fieldset class="form-group">
                            <label for="demo-title" class="col-sm-3 control-label">标题</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="标题" name="posts-title" value="<?php echo $one['title']?>">
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="demo-author" class="col-sm-3 control-label">作者</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="作者" name="posts-author" value="<?php echo $one['author']?>">
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="demo-from" class="col-sm-3 control-label">来源</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="来源" name="posts-from" value="<?php echo $one['form']?>">
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="demo-desc" class="col-sm-3 control-label">描述</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="描述" name="posts-desc" value="<?php echo $one['desc']?>">
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="demo-thumk" class="col-sm-3 control-label">文章封面</label>
                            <div class="col-sm-5 thumb-image">
                                <a href="javascript:void(0);"  class="thumbnail" >
                                    <img src="<?php echo $one['thumb']?>"  alt="选择封面图像" class="img-responsive" title="文章封面" />
                                    <input type="hidden" name="posts-img" value="<?php echo $one['thumb']?>">
                                </a>
                            </div>

                        </fieldset>
                        <?php endforeach;?>
                        <fieldset class="form-group">
                            <label for="demo-category" class="control-label col-sm-3">文章分类</label>
                            <div class="col-sm-5">
                                <select name="category_id" class="form-control">
                                    <?php foreach ($category_colls as $one):?>
                                        <option value="<?php echo $one['id'];?>"><?php echo $one['name'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </fieldset>
                        <?php foreach ($editlist as $i) :?>
                        <fieldset class="from-group">
                            <h3>文章内容</h3>
                            <div id="test-editormd">
                                <textarea style="display:none;" name="post-content" id="content"><?php echo $i['content']?></textarea>
                            </div>
                        </fieldset>
                        <?php endforeach;?>
                        <fieldset class="form-group">
                            <label for="demo-Audit" class="col-sm-2 control-label" style="text-align: left;margin-left: 5rem">审核状态</label>
                            <div class="col-sm-5">
                                <div class="radio">
                                    <!-- Inline radio buttons -->
                                    <input id="demo-inline-form-radio" class="magic-radio" type="radio" name="status" checked="" value="1">
                                    <label for="demo-inline-form-radio">正常</label>

                                    <input id="demo-inline-form-radio-2" class="magic-radio" type="radio" name="status" value="0">
                                    <label for="demo-inline-form-radio-2">待审核</label>

                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="col-sm-5 col-sm-offset-1">
                                <div class="btn-group">
                                    <button class="btn btn-success" type="submit">保存</button>
                                    <a href="<?php echo url("default/articlelist")?>" class="btn btn-default">取消</a>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sel-articleimg"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">选择图片 </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="sel-img-content clearfix">
                            <?php if (count($img_colls) == 0):?>
                                <div class="alert alert-pink">
                                    <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                                    <strong>错误!</strong> 空的图像
                                </div>
                            <?php endif;?>
                            <?php foreach ($img_colls as $img):?>
                                <div class="col-sm-2">
                                    <div class="thumbnail">
                                        <a href="javascript:void(0);"><img src="<?php echo $_BASE_DIR.$img['path']?>" alt="" class="img-responsive"></a>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
                    <button id="doneBtn" class="btn btn-success" data-dismiss="modal" aria-hidden="true">选择</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->_endblock();?>
<?php $this->_block('scripts');?>
    <script src="<?php echo $_BASE_DIR;?>lib/node_modules/editor.md/editormd.js" type="text/javascript"></script>
    <script src="<?php echo $_BASE_DIR;?>lib/node_modules/jquery-form/jquery.form.js" type="text/javascript"></script>
    <script src="<?php echo $_BASE_DIR;?>lib/node_modules/select2/dist/js/select2.js" type="text/javascript"></script>
    <script src="<?php echo $_BASE_DIR;?>lib/node_modules/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
    <script>
//        editor 编辑器
        var testEditor;
//        内容
        var content;
//        选择的图片
        var imgcontent;
        var md;
        $(function() {
            md = $('#content').val();
            testEditor = editormd("test-editormd", {
                width              : "90%",
                height             : 640,
                path               : "<?php echo $_BASE_DIR;?>/lib/node_modules/editor.md/lib/",
                delay              : 1000,
                codeFold           : true,
                saveHTMLToTextarea : true,
                searchReplace      : true,
                markdown           : md,
                htmlDecode         : "style,script,iframe",
                emoji              : true,
                taskList           : true,
                placeholder        : "请输入markdown内容",
                tex                : true,
                flowChart          : true,
                syncScrolling : "single",
                sequenceDiagram    : true
            });
            $('.thumb-image').click(function(){
                $('#sel-articleimg').modal('toggle')
                $("#sel-articleimg .modal-body").on('click','div.col-sm-2',function(){
//                    添加选择样式
                    $(this).addClass('active').siblings('div').removeClass('active');
//                    选择的图像
                    imgcontent = $(this).find('a img.img-responsive').attr('src');
                });
                $('#doneBtn').click(function () {
//                    点击modal 确定后显示到页面
                    $('form .thumb-image').find('img').attr('src',imgcontent);
                    $('input[name="posts-img"]').val(imgcontent);
                });
            });
            $('form .form-group select').select2();

//            form表单空值验证
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
//            提交成功后
            function successSubmit(responseText, statusText, xhr, $form)
            {
                if(statusText == 'success')
                {
                    swal("成功", "你成功x修改了", "success")
                }
            }
            var options = {
                type:"POST",
                dataType :'json',
                beforeSubmit:beforeSubmit,
                success:successSubmit,
                clearForm: true,
                resetForm: true,
                timeout:   3000
            };
            $("#create_article").submit(function (form) {
                content = testEditor.getMarkdown();
                $(this).find('#content').val(content);   //把编辑插件的值返回textarea
                $(this).ajaxSubmit(options);
                return false;
            });
//            $('.btn-success').on('click',function (e) {
//                e.preventDefault();
//                console.log(testEditor.getMarkdown());
//            });
        });

    </script>
<?php $this->_endblock();?>
