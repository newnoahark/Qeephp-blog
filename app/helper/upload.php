<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/11 0011
 * Time: 下午 1:59
 * Name: "万文峰"
 * 上传文件保存到数据库中方法
 */
class Helper_Upload
{

    public function __construct()
    {
    }

    public function saveData($userId,$userName,$path)
    {

        if(isset($userId) && isset($path) && !empty($path))
        {
            $upload =  new Uploadimg(array('path'=>$path,'user_id'=>$userId,'username'=>$userName));
            $upload->save();
        }else
        {
            return json_encode('上传错误');
        }

    }
}