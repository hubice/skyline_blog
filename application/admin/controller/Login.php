<?php

namespace app\admin\controller;

use app\common\server\SysUserServer;
use base\BaseAdminController;

class Login extends BaseAdminController
{
    public function _initialize() {

    }

    public function index() {
        if (session('user_info')) {
            $this->redirect('@admin/index');
        }
        $this->assign('title','后台登陆');
        return $this->fetch();
    }

    public function login() {
        $data = [
            'username' => input('param.username','','trim'),
            'password' => input('param.password','','trim')
        ];
        $is_vali = $this->validate($data,'SysUserValidate.login',true);
        if ($is_vali !== true) {
            return jsons([],'1000',$is_vali);
        }
        // 获取用户数据
        $userInfo = SysUserServer::getUserInfo($data['username']);
        if (empty($userInfo)) {
            return jsons([],'1001',SysUserServer::$err);
        }
        // 判断status
        if ($userInfo['s_status'] != 1) {
            return jsons([],'1002','用户被禁用');
        }
        // 判断密码
        if ($userInfo['password'] !== password($data['password'])) {
            return jsons([],'1003','密码错误');
        }
        $userInfo['password'] = '';
        // 成功登陆
        session('user_info',$userInfo);

        return jsons('ok');
    }

    public function logout() {
        session('user_info', null);
        session( null);
        $this->redirect('@admin/login');
    }
}