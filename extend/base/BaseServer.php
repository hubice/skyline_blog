<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/1
 * Time: 0:40
 */
namespace base;

class BaseServer {

    public static $err = '未知错误';

    // 遍历数组
    protected static function toArray($ar) {
        $res = [];
        if ($ar && is_array($ar)) {
            foreach ($ar as $v) {
                $res[] = $v->toArray();
            }
        }
        return $res;
    }
}


