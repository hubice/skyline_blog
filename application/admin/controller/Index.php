<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/2
 * Time: 23:45
 */
namespace app\admin\controller;

use app\common\server\SysMenuServer;
use base\BaseAdminController;

class Index extends BaseAdminController {

    public function index() {
        $menu = SysMenuServer::getAll();
        $this->assign('menu',$menu);
        $this->assign('title','后台管理');
        return $this->fetch();
    }
}