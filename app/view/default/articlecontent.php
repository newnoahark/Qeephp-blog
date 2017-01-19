<?php $this->_extends('_layouts/default_layout'); ?>
<?php $this->_block('title'); ?>文章内容<?php $this->_endblock(); ?>
<?php $this->_block('links');?>
<link rel="stylesheet" href="<?php echo $_BASE_DIR?>css/main.css" type="text/css">
<!--   editor.md 预览样式-->
<link rel="stylesheet" href="<?php echo $_BASE_DIR?>lib/node_modules/editor.md/css/editormd.preview.css" type="text/css">
<?php $this->_endblock()?>
<?php $this->_block('contents')?>
<div class="container relative">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <!-- Post -->
            <div class="blog-item mb-80 mb-xs-40">
                <!-- Text -->
                <div class="blog-item-body" id="blog-item-body">
                    <h1 class="mt-0 font-alt"><?php echo $article_content['title']?></h1>
                    <div class="blog-item-data">
                        <a href="#"><i class="fa fa-user"></i><?php echo $article_content['author'] ?></a>
                        <span class="separator">&nbsp;</span>
                        <a href=""> <i class="fa fa-calendar"></i><?php echo $article_content['create_at'] ?></a>
                        <span class="separator">&nbsp;</span>
                        <a href="#"><i class="fa fa-comments"></i> <?php echo $article_content['desc'] ?></a>
                        <span class="separator">&nbsp;</span>
                        <a href="#"><i class="fa fa-anchor"></i> <?php echo $article_content['form'] ?></a>
                    </div>
                    <textarea style="display: none" name="editormd-markdown-doc"><?php echo $article_content['content'] ?></textarea>
                </div>
                    <!-- End Text -->

                </div>
                <!-- End Text -->
            </div>
            <!-- End Post -->
        </div>
    </div>
</div>
<?php $this->_endblock('contents')?>

<?php $this->_block('scripts')?>
<script src="<?php echo $_BASE_DIR?>lib/node_modules/editor.md/lib/marked.min.js" type="text/javascript"></script>
<script src="<?php echo $_BASE_DIR?>lib/node_modules/editor.md/lib/raphael.min.js" type="text/javascript"></script>
<script src="<?php echo $_BASE_DIR?>lib/node_modules/editor.md/lib/prettify.min.js" type="text/javascript"></script>
<script src="<?php echo $_BASE_DIR?>lib/node_modules/editor.md/lib/underscore.min.js" type="text/javascript"></script>
<script src="<?php echo $_BASE_DIR?>lib/node_modules/editor.md/lib/sequence-diagram.min.js" type="text/javascript"></script>
<script src="<?php echo $_BASE_DIR?>lib/node_modules/editor.md/lib/jquery.flowchart.min.js" type="text/javascript"></script>
<script src="<?php echo $_BASE_DIR?>lib/node_modules/editor.md/lib/flowchart.min.js" type="text/javascript"></script>
<script src="<?php echo $_BASE_DIR?>lib/node_modules/editor.md/editormd.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        var editormdView;
        var markdown  = "";
        editormdView = editormd.markdownToHTML("blog-item-body", {
            markdown        : markdown ,//+ "\r\n" + $("#append-test").text(),
            //htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
            htmlDecode      : "style,script,iframe",  // you can filter tags decode
            //toc             : false,
            tocm            : true,    // Using [TOCM]
            //tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
            //gfm             : false,
            //tocDropdown     : true,
            //markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
            emoji           : true,
            taskList        : true,
            tex             : true,  // 默认不解析
            flowChart       : true,  // 默认不解析
            sequenceDiagram : true,  // 默认不解析
        });
    });
</script>
<?php $this->_endblock('scripts')?>
