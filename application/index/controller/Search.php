<?php
namespace app\index\controller;

use app\common\server\BlogServer;
use base\BaseController;

class Search extends BaseController
{
    public function index()
    {
        $name = input('tag','','trim');
        if (!$name) {
            $this->error('参数错误');
        }
        $blogInfo = BlogServer::getBlogByTagName($name);
        if ($blogInfo === false) {
            $this->error(BlogServer::$err.',请稍后重试');
        }
        $this->showInit(); //获取头部尾部公共
        $this->assign('blogInfo',$blogInfo);
        return $this->fetch();
    }
}