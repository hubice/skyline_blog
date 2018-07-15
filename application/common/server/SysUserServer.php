<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/2
 * Time: 23:37
 */
namespace app\common\server;

use app\common\model\SysUserModel;
use base\BaseServer;

class SysUserServer extends BaseServer {

    public static function getUserInfo($username) {
        $userInfo = SysUserModel::getUserInfo($username);
        if (!$userInfo) {
            self::$err = 'UserInfo没有数据';
            return false;
        }
        return $userInfo->toArray();
    }

    public static function getUserInfoById($id) {
        $userInfo = SysUserModel::getUserInfoById($id);
        if (!$userInfo) {
            self::$err = 'UserInfo没有数据';
            return false;
        }
        return $userInfo->toArray();
    }

    public static function uploadInfo($uid,$data) {
        $res = SysUserModel::uploadInfo($uid,$data);
        if (!$res) {
            self::$err = 'UserInfo更新失败';
            return false;
        }
        return $res;
    }
}