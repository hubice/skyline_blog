<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/2
 * Time: 23:34
 */
namespace app\common\model;

use think\Model;

class SysMenuModel extends Model {

    protected $table = 'ice_system_menu';

    public static function getAll() {
        return self::all(function($query){
            $query->where('s_status',1)->order('sort', 'desc');
        });
    }
}