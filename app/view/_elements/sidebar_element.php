<!-- Search Widget -->
    <div class="widget">
        <form class="form-inline form" role="form">
            <div class="search-wrap">
                <button class="search-button animate" type="submit" title="开始查找">
                    <i class="fa fa-search"></i>
                </button>
                <input type="text" class="form-control search-field" placeholder="查找">
            </div>
        </form>
    </div>
    <!-- End Search Widget -->
        <!-- Widget -->
        <div class="widget">
            <h5 class="widget-title font-alt">类别</h5>
            <div class="widget-body">
                <ul class="clearlist widget-menu">
                    <?php foreach ($cateGoryList as $j):?>
                        <li>
                            <a href="#" title=""><i class="fa fa-tags" style="margin-right: .5rem"></i><?php echo $j['name'] ?></a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>

        </div>
        <!-- End Widget -->


    <!-- Widget -->
    <div class="widget">

        <h5 class="widget-title font-alt">标签</h5>

        <div class="widget-body">
            <div class="tags">
                <a href="">设计</a>
                <a href="">组合</a>
                <a href="">品牌</a>
                <a href="">主题</a>
                <a href="">八卦</a>
                <a href="">感情</a>
                <a href="">UI & UX</a>
                <a href="">爱</a>
            </div>
        </div>

    </div>
    <!-- End Widget -->

    <!-- Widget -->
    <div class="widget">

        <h5 class="widget-title font-alt">去年的帖子</h5>

        <div class="widget-body">
            <ul class="clearlist widget-posts">
                <li class="clearfix">
                    <a href=""><img src="" alt="" class="widget-posts-img" /></a>
                    <div class="widget-posts-descr">
                        <a href="#" title="">简单爱</a>
                    </div>
                </li>
            </ul>
        </div>

    </div>
    <!-- End Widget -->

    <!-- Widget -->
    <div class="widget">

        <h5 class="widget-title font-alt">评论</h5>

        <div class="widget-body">
            <ul class="clearlist widget-comments">
                <li>
                     <a href="#" title="">地下城与勇士</a>
                </li>
            </ul>
        </div>

    </div>
    <!-- End Widget -->

    <!-- Widget -->
    <div class="widget">

        <h5 class="widget-title font-alt">用户介绍</h5>

        <div class="widget-body">
            <div class="widget-text clearfix">
                <img src="" alt="" width="70" class="img-circle left img-left">
                来自南昌市
            </div>
        </div>

    </div>
    <!-- End Widget -->

    <!-- Widget -->
    <div class="widget">

        <h5 class="widget-title font-alt">推荐内容</h5>

        <div class="widget-body">
            <ul class="clearlist widget-menu">
                <li>
                    <a href="#" title="">新浪微博</a>
                </li>
                <li>
                    <a href="#" title="">QQ空间</a>
                </li>
                <li>
                    <a href="#" title="">情感铺子</a>
                </li>
            </ul>
        </div>

    </div>
    <!-- End Widget -->