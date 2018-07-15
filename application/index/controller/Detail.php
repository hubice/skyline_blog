<?php
namespace app\index\controller;

use app\common\server\BlogServer;
use base\BaseController;

class Detail extends BaseController
{
    public function index() {
        $id = input('id',0,'int');
        if (!$id) {
            $this->error('参数错误');
        }
        // 获取内容
        $blogInfo = BlogServer::getBlogById($id);
        if ($blogInfo === false) {
            $this->error(BlogServer::$err.',请稍后重试');
        }
        // 统计数据
        BlogServer::incBlogView($id);
        // 获取头部尾部公共
        $this->showInit();
        $this->assign('blogDetail',$blogInfo);
        return $this->fetch();
    }
}
