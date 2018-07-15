<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 应用公共文件

function password($str) {
    return md5('ice'.$str);
}

function scan_all_dir($path, $data = [], $ext = 'php') {
    foreach (scandir($path) as $dir) {
        if ($dir[0] === '.') {
            continue;
        }
        if (($tmp = realpath($path . DS . $dir)) && (is_dir($tmp) || pathinfo($tmp, 4) === $ext)) {
            is_dir($tmp) ? $data = array_merge($data, scan_all_dir($tmp)) : $data[] = $tmp;
        }
    }
    return $data;
}

function jsons($data,$code = 0,$msg = 'ok') {
    return json([
        'status' => $code,
        'msg' => $msg,
        'data' => $data ? $data : []
    ]);
}