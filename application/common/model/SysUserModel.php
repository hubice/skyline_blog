<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/2
 * Time: 23:34
 */
namespace app\common\model;

use think\Model;

class SysUserModel extends Model {

    protected $table = 'ice_system_user';

    public static function getUserInfo($username) {
        return self::get(function ($query) use ($username) {
            $query->where('username',$username);
        });
    }

    public static function getUserInfoById($id) {
        return self::get($id);
    }

    public static function uploadInfo($uid,$data) {
        $data['id'] = $uid;
        $data['s_update_time'] = time();
        return self::update($data);
    }
}