<?php

/**
 * 默认控制器
 */

class Controller_Default extends Controller_Abstract
{
    private $message;
    function __construct($app)
    {
        parent::__construct($app);
        $this->_init();
        $this->_view['user'] = $this->_user;
    }
    /*主页*/
    function actionIndex()
    {

        $category =Articlecategorys::find()->order('id')->getAll();
        $this->_view['cateGoryList'] = $category;
        /*
         * 通过阅读paginator 类来自己实现的一个paginator类方法
         * 实例化分页类
         * parma 每页显示项目数 相当于 mysql limit
         * 页码参数   相当于mysql offset
        */
        $sql = QDB::getConn()->execute("SELECT * FROM `article` WHERE `id` != ?",array(0))->fetchAll();
        $help = new Helper_Paginator("4","page");
//        总记录数
        $help->setTotal(count($sql));
//        获取数据库数据限制到页码中
        $limit = $help->getLimit();
//        使用offset 和limit 来关联paginator 按钮创建分页数据
        $this->_view['colles'] = QDB::getConn()->execute("SELECT * FROM article  LIMIT ?  OFFSET ?  ",array(intval($help->_perPage),intval($limit[0])))->fetchAll();
        //        创建分页按钮
        $this->_view["paginator"] = $help->pageLink();
    }
    /*404错误页面*/
    function actionError400()
    {
    }
    /*用户登录  控制器*/
    function actionLogin()
    {
//        判断上下文是否为post 请求
        if($this->_context->isPOST())
        {
            try
            {
//                账户
                $account =  $this->_context->username;

//                获取提交账户的类型 为邮箱
                $type = $this->_context->post('account_type','email');
//                验证邮箱
                if($type != 'email' )
                {
                    throw new QException("无效的电子邮箱地址");
                }
                elseif ($type == 'mobile')
                {
//                    判断是否为手机
                    $account = preg_replace('/[+\s\d(\)-]+/','',$account);
                }
                elseif ($type != 'email' && $type != 'mobile')
                {
                    throw new QException("输入邮箱或者手机号码");
                }else
                {

                   $password = $this->_context->password;
                }
//               验证用户登录并返回用户对象  账户类型是否为email 使用行为插件
                $record = Users::meta()->validateLogin($account,$password,$type == 'email'? 'FIRST':'SECOND');
                if($record->status == 1)
                {
                   $roles = $record->aclRoles();  //用户角色信息
                    $this->_app->changeCurrentUser( $record->aclData(), $roles ); //保存或更改角色数据到seesion中
                    $record->update_at = time();
                    $record->save();   //保存
//                    跳转到后台页面
                    $history = count($roles) >1 ? url('admin::default/index') : url('default/index');
                    return $this->_redirect($history);
                }else
                {
                    $this->message = '用户不存在。请注册';
                }
            }
            catch (Exception $ex)
            {
                //异常写入日志
//                Helper_AppFun::saveRunningLog($ex);
                $this->message = '密码输入错误';
            }
//           显示错误提示消息
            return $this->_redirectMessage('拒绝',$this->message,url('default/login'));
        }
//        提交错误返回登入页面
        $this->_viewname = 'login';
    }
//    注册用户
    function actionSignUp()
    {
        if($this->_context->isPOST())
        {
            try
            {
//                开始事务
                QDB::getConn()->startTrans();
//                账户
                $account =  $this->_context->email;
//                获取提交账户的类型 为邮箱
                $type = $this->_context->post('account_type','email');
//                验证邮箱
                if($type != 'email' )
                {
                    throw new QException("无效的电子邮箱地址");
                }
                elseif ($type == 'mobile')
                {
//                    判断是否为手机
                    $account = preg_replace('/[+\s\d(\)-]+/','',$account);
                }
                elseif ($type != 'email' && $type != 'mobile')
                {
                    throw new QException("输入邮箱或者手机号码");
                }
//                写入模型
                $user = new Users(array(
                    'name'      =>   $this->_context->name,
                    'email'     =>   $account,
                    'password'  =>   $this->_context->password
                ));
                $user->roles[] = Roles::find('id=1')->getOne();//角色
                $user->save();//存入数据库
                $this->message = "注册成功";
                QDB::getConn()->completeTrans(); //完成事务
            }catch (AclUser_DuplicateUsernameException  $e)
            {
                QDB::getConn()->completeTrans(false); //是否完成事务
                $this->message = "你输入的账户已经存在";
                $this->_redirectMessage("已经存在的账户",$this->message,url('default/signup'));
            }catch (QException $e)
            {
                QDB::getConn()->completeTrans(false); //是否完成事务
                $this->message = "注册失败,检查是否输入正确";
                $this->_redirectMessage("注册失败",$this->message,url('default/signup'));
            }
          return $this->_redirectMessage("注册返回消息",$this->message,url('default/index'));
        }
        $this->_viewname = 'signup';
    }
    /*注销用户*/
    function actionSignout()
    {
        if($this->_user)
        {
            $this->_app->cleanCurrentUser();
        }
        return $this->_redirect(url('default/login'));
    }
//    博客内容页面
    function actionArticleContent()
    {
        $article = Articles::find('id=?',$this->_context['id'])->order('desc')->getOne();
        if($article['status'] == 1)
        {
            $article['view_count'] += 1;
            $article->save();
        }
        $this->_view['article_content'] = $article;
    }
//    相册列表
    function actionPhoto()
    {
        $sql = QDB::getConn()->execute("SELECT * FROM `upload_img` WHERE `id` != ?",array(0))->fetchAll();
        $help = new Helper_Paginator("6","imgpage");
//        总记录数
        $help->setTotal(count($sql));
//        获取数据库数据限制到页码中
        $limit = $help->getLimit();
//        使用offset 和limit 来关联paginator 按钮创建分页数据
        $this->_view['photos'] = QDB::getConn()->execute("SELECT * FROM upload_img  LIMIT ?  OFFSET ?  ",array(intval($help->_perPage),intval($limit[0])))->fetchAll();
        $this->_view["paginator"] = $help->pageLink('?action=photo&'); //分页action地址
        $this->_viewname = 'photo';
    }
    function actionAbout()
    {

    }


}

