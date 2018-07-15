<?php

namespace base;

use app\common\server\BlogServer;
use app\common\server\NavServer;
use think\Controller;

class BaseController extends Controller
{
    private function header() {
        $headerNav = NavServer::getNavAll();
        $this->assign('headerNav',$headerNav);
    }

    private function footer() {
        $footerBlogs = BlogServer::getBlogHost();
        $this->assign('footerBlogs',$footerBlogs);
    }

    public function showInit() {
        $this->header();
        $this->footer();
    }
}
