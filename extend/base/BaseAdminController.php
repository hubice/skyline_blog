<?php

namespace base;

use think\Controller;

class BaseAdminController extends Controller {

    protected $user = '';

    public function _initialize() {
        $this->user = session('user_info');
        if (empty($this->user)) {
            $this->redirect('@admin/login');
        }
    }

    protected function page($all,$curr,$step,$length) {
        $res = [];
        $res['allCount'] = $all;
        $res['allPage'] = ceil($all/$step);
        $res['currPage'] = $curr;
        $res['pre'] = $res['currPage'] > 1 ? $res['currPage'] - 1 : 1;
        $res['next'] = $res['allPage'] > $res['currPage'] ? $res['currPage'] + 1 : $res['currPage'];

        $_num = intval(($length - 1)/2);
        $_sta = $res['currPage'] - $_num > 1 ? $res['currPage'] - $_num : 1;
        $_end = $_sta + $length - 1 > $res['allPage'] ? $res['allPage'] : $_sta + $length - 1;
        $res['for_end'] = $_end;
        $res['for_sta'] = $_sta;
        return $res;
    }
}