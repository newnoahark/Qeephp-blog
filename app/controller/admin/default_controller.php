<?php
// $Id$

/**
 * Controller_Admin_Default 控制器
 */
class Controller_Admin_Default extends Controller_Abstract
{
    function __construct($app)
    {
        parent::__construct($app);
        $this->_init();
//        登入之后传递用户名到视图
        $this->_view['user'] = $this->_user;
    }

    function actionIndex()
	{
        // 为 $this->_view 指定的值将会传递数据到视图中
		# $this->_view['text'] = 'Hello!';
	}
//	注销登入
    function actionSignout()
    {
        if($this->_user)
        {
            $this->_app->cleanCurrentUser();
        }
        return $this->_redirect(url('default::default/login'));
    }
//    文章列表
    function actionArticleList()
    {

    }
//   创建
    function actionCreatePosts()
    {
        $category_list = Articlecategorys::find()->getAll();
        $this->_view['category_colls'] = $category_list;
        $this->_view['img_colls'] = Uploadimg::find()->order('user_id')->getAll();
        if(!$this->_user['id'])
        {
            return $this->_redirect(url('default::default/login'));
        }
        if($this->_context->isPOST())
        {
            try
            {
                QDB::getConn()->startTrans();
                $title = $this->_context->post('posts-title');
                $author = $this->_context->post('posts-author');
                $from = $this->_context->post('posts-from');
                $desc = $this->_context->post('posts-desc');
                $category_id = $this->_context->post('category_id');
                $content = $this->_context->post('post-content');
                $thumb_img = $this->_context->post('posts-img');
                $status = $this->_context->post('status');
                if(!empty($title) && !empty($content))
                {
                    $isTitle = Articles::find('title = ?',$title)->getOne();
                    if(isset($isTitle) && $isTitle->id >0)
                    {
                        return json_encode('存在的文章');
                    }else
                    {
                        $crateArticle = new Articles(array(
                            'title'     => $title,
                            'author'    => $author,
                            'desc'      => $desc,
                            'form'      => $from,
                            'content'   => $content,
                            'category_id' =>$category_id,
                            'thumb'     => $thumb_img,
                            'status'    => $status,
                            'view_count'=> 0
                        ));
                        $crateArticle->save();
                        QDB::getConn()->completeTrans();
                        return json_encode("success");
                    }
                }
            }catch (Exception $e)
            {
                QDB::getConn()->completeTrans(false);
            }
        }
    }
//    编辑文章
    function actionEditPosts()
    {
        $editId = $this->_context->id;
        if($this->_context->isPOST())
        {
            $title = $this->_context->post('posts-title');
            $author = $this->_context->post('posts-author');
            $from = $this->_context->post('posts-from');
            $desc = $this->_context->post('posts-desc');
            $category_id = $this->_context->post('category_id');
            $content = $this->_context->post('post-content');
            $thumb_img = $this->_context->post('posts-img');
            $status = $this->_context->post('status');
            if(!empty($title) && !empty($content))
            {
//                更新修改
                    Articles::meta()->updateWhere(array('title'=>$title,'author'=>$author,'form'=>$from,'desc'=>$desc,'category_id '=>$category_id, 'content'=>$content,
                        'thumb'   => $thumb_img,
                        'status'    => $status),"id=?",$editId);
                    return json_encode('success');
            }
        }
        $this->_view['category_colls'] = Articlecategorys::find()->getAll();
        $this->_view['img_colls'] = Uploadimg::find()->order('user_id')->getAll();
        $this->_view['editlist'] = Articles::find('id=?',$editId)->order('desc')->getAll()->toHashMap('id');

    }
//    删除文章
    function actionDeletePosts()
    {
        if($this->_context->isPOST())
        {
            //        请求的id
            $delId = $this->_context->id;
            Articles::meta()->deleteWhere('id=?',$delId);
        }else
        {
            return $this->_redirect(url('default/articlelist'));
        }


    }

//    分类列表
    function actionCategoryList()
    {

    }
//    删除分类
    function actionRemoveCategory()
    {
        if($this->_context->isPOST())
        {
            $delete_id = $this->_context->id;
            Articlecategorys::meta()->deleteWhere('id = ?',$delete_id);
        }else
        {
            return $this->_redirect(url('default/categorylist'));
        }
    }
//编辑分类
    function actionEditCategory()
    {

        if($this->_context->isPOST())
        {
            try
            {
                $editId = $this->_context->id;

                $name = $this->_context->post("category-name");
                $date = $this->_context->post('category-date');
                $list = Articlecategorys::find('id = ?',$editId)->getOne();
                QDB::getConn()->startTrans(); //开始事务
                $list->name = $name;
                $list->date = $date;
                $list->save();
                QDB::getConn()->completeTrans();

            }catch (Exception $e)
            {
                QDB::getConn()->completeTrans(false);
            }

        }else
        {
            return $this->_redirect(url('default/categorylist'));
        }
        $this->_viewname = "creategateory";
    }

// 创建分类
    function actionCreateGateory()
    {
        try
        {
            if($this->_context->isPOST())
            {
                QDB::getConn()->startTrans();
                $updateDate = $this->_context->post("category-date");
                $categoryName = $this->_context->post('category-name');
                if(!empty($updateDate)  && !empty($categoryName))
                {
                    $names = Articlecategorys::find("name=?",$categoryName)->getOne();
                    if(isset($names) && $names->id > 0)
                    {
                        return  json_encode("存在的分类");
                    }else
                    {
                        $category = new Articlecategorys(array(
                            'name'   => $categoryName,
                            'date' => $updateDate
                        ));
                        $category->save();
                        QDB::getConn()->completeTrans();
                        return json_encode("success");
                    }

                }
                else
                {
                    QDB::getConn()->completeTrans(false);
                }
            }
        }catch (QException $e)
        {
            QDB::getConn()->completeTrans(false);
            return $this->_redirect(url('default/creategateory'));
        }
        $this->_viewname = "creategateory";
    }
//    图片上传
    function actionUpload()
    {
        $this->_view['user'] = $this->_user;
    }
    function actionUploadImg()
    {
        if($this->_context->isPOST())
        {
            QDB::getConn()->startTrans();
            if (empty($_FILES['images'])) {
                echo json_encode(['error'=>'没有要上传的文件!!!!!']);
                return; // 退出
            }
    //        获取提交上传的文件
            $images = $_FILES['images'];
    //        上传文件的用户名和id
            $userId = empty($this->_context->post('userid')) ? "" : $this->_context->post('userid');
            $userName = empty($this->_context->post('username')) ? "" : $this->_context->post('username');
            /*是否上传成功*/
            $success = null;
            //        上传路径
            $path = "";
            /*上传文件名*/
            $filename = $images['name'];
    //        循环文件
            for($i=0;$i<count($filename);$i++)
            {
    //            分离文件后缀
                $ext = explode('.',basename($filename[$i]));

                $url = dirname(dirname(dirname(__FILE__)));
                //上传目标目录
                $target =  "img".DIRECTORY_SEPARATOR.md5(uniqid()).".".array_pop($ext);
    //            移动文件到目标目录中
                if(move_uploaded_file($images['tmp_name'][$i],$target))
                {
                    $success = true;
                    $path = $target;
                }else
                {
                    $success = false;
                    break;
                }
            }
            if($success === true)
            {
//                存储到数据中
                $data = new Helper_Upload();
                $data->saveData($userId,$userName,$path);
                $output = [];
            }elseif ($success === false)
            {
                $output = ['error'=>'文件上传失败'];
//                上传失败删除文件
                foreach ($path as $file)
                {
                    unlink($file);
                }
            }
            echo json_encode($output);
            QDB::getConn()->completeTrans();
        }else
        {
            QDB::getConn()->completeTrans(false);
        }
    }
}


