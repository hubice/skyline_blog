<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/2
 * Time: 23:37
 */
namespace app\common\server;

use app\common\model\SysMenuModel;
use base\BaseServer;

class SysMenuServer extends BaseServer {

    public static function getAll() {
        $data = SysMenuModel::getAll();
        $menu = [];
        if (empty($data)) {
            self::$err = 'menu数据为空';
            return false;
        }
        foreach ($data as $v) {
            $menu[$v->pid][] = $v->toArray();
        }
        return $menu;
    }
}