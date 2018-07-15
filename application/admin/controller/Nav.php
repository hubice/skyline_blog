<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/6
 * Time: 11:47
 */
namespace app\admin\controller;

use app\common\server\NavServer;
use base\BaseAdminController;

class Nav extends BaseAdminController {

    public function index() {
        $page = input('param.page',1,'int');
        $step = input('param.step',20,'int');
        $limit = (($page - 1) * $step).','.$step;

        $where = '0 = 0';
        $nav = NavServer::getAllNav($where,$limit);

        $page = $this->page($nav['other'],$page,$step,5); //这是分页
        $this->assign('nav',$nav);
        $this->assign('page',$page);

        return $this->fetch();
    }
}