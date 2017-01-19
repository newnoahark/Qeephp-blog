<?php
// $Id$

/**
 * Controller_Admin_Categoryapi 控制器
 * datatables 插件api 数据
 */
class Controller_Admin_Categoryapi extends Controller_Abstract
{
    function __construct($app)
    {
        parent::__construct($app);
        $this->_init();
    }

    function actionIndex()
	{
        // 为 $this->_view 指定的值将会传递数据到视图中
		# $this->_view['text'] = 'Hello!';
	}
//	类型api
	function actionCategoryApi()
    {

//        表名
        $table = 'article_category';
        // 主键
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'name',  'dt' => 1 ),
            array( 'db' => 'create_at',  'dt' => 2 ),
            array( 'db' => 'date',    'dt' => 3 )
        );
        $conn = array(
            'user' => 'root',
            'pass' => 'k3s5fnn8z',
            'db'   => 'qeeblog',
            'host' => 'localhost'
        );
        echo json_encode(Helper_SspData::simple($_GET,$conn,$table, $primaryKey, $columns));
    }
//    文章api
    function actionArticleApi()
    {

//        表名
        $table = 'article';
        // 主键
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'title',  'dt' => 1 ),
            array( 'db' => 'author',  'dt' => 2 ),
            array( 'db' => 'form',    'dt' => 3 ),
            array( 'db' => 'desc',    'dt' => 4 ),
            array( 'db' => 'create_at',    'dt' => 5 ),
            array( 'db' => 'update_at',    'dt' => 6 ),
        );
        $conn = array(
            'user' => 'root',
            'pass' => 'k3s5fnn8z',
            'db'   => 'qeeblog',
            'host' => 'localhost'
        );
        echo json_encode(Helper_SspData::simple($_GET,$conn,$table, $primaryKey, $columns));
    }
}


