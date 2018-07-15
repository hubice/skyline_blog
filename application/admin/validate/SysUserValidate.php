<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/25
 * Time: 19:51
 */

namespace app\admin\validate;

use think\Validate;

class SysUserValidate extends Validate {

    protected $rule = [
        'username' => 'require|length:4,16',
        'password' => 'require|length:6,18',
        'email' => 'email',
        'phone' => 'number|length:11',
        'newPassword' => 'require|length:6,18',
    ];

    protected $scene = [
        'login'  =>  ['username','password'],
        'upload' =>  ['username','email','phone'],
        'pwd' => ['password','newPassword']
    ];
}