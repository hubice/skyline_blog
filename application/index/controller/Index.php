<?php
namespace app\index\controller;

use app\common\server\BlogServer;
use base\BaseController;

class Index extends BaseController
{
    public function index()
    {
        $blogInfo = BlogServer::getAllBlogList();
        $this->assign('blogInfo',$blogInfo);
        $this->showInit(); //获取头部尾部公共
        return $this->fetch();
    }
}
