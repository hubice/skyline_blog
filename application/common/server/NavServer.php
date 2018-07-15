<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/1
 * Time: 22:12
 */

namespace app\common\server;

use app\common\model\NavModel;
use base\BaseServer;

class NavServer extends BaseServer {

    public static function getNavAll() {
        $res = NavModel::getNavAll();
        return parent::toArray($res);
    }

    public static function getAllNav($where,$limit) {
        $res['data'] = [];
        $res['other'] = NavModel::getCount($where);
        if ($res['other']) {
            $bolgData = NavModel::getNavList($where,$limit);
            $res['data'] = parent::toArray($bolgData);
        }
        return $res;
    }
}