<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/1
 * Time: 0:33
 */
namespace app\common\model;

use think\Model;

class NavModel extends Model {

    protected $table = 'ice_nav';

    public static function getNavAll() {
        $map['s_status'] = 1;
        return self::all($map);
    }

    public static function getNavList($where,$limit) {
        return self::all(function($query) use ($where,$limit) {
            $query->where($where)->order('sort desc')->limit($limit);
        });
    }

    public static function getCount($where) {
        return self::where($where)->count();
    }
}