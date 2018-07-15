<?php
/**
 * Created by PhpStorm.
 * User: Skyline
 * Date: 2018/4/2
 * Time: 23:45
 */
namespace app\admin\controller;

use app\common\server\SysUserServer;
use base\BaseAdminController;

class SysUser extends BaseAdminController {

    public function index() {
        $this->assign('userInfo',$this->user);
        return $this->fetch();
    }

    public function upload() {
        $data = [
            'username' => input('param.username','','trim'),
            'email' => input('param.email','','trim'),
            'phone' => input('param.phone','','trim'),
        ];
        $is_vali = $this->validate($data,'SysUserValidate.upload',true);
        if ($is_vali !== true) {
            return jsons([],'1000',$is_vali);
        }
        // 更新数据
        $uid = $this->user['id'];
        $resId = SysUserServer::uploadInfo($uid,$data);
        if ($resId == false) {
            return jsons([],'1001',SysUserServer::$err);
        }
        return jsons($resId);
    }

    public function pwd() {
        return $this->fetch();
    }

    public function changePwd() {
        $data = [
            'password' => input('param.oldPassword','','trim'),
            'newPassword' => input('param.newPassword','','trim'),
        ];
        $is_vali = $this->validate($data,'SysUserValidate.pwd',true);
        if ($is_vali !== true) {
            return jsons([],'1000',$is_vali);
        }
        // 查找用户
        $uid = $this->user['id'];
        $userInfo = SysUserServer::getUserInfoById($uid);
        if (empty($userInfo)) {
            return jsons([],'1001',SysUserServer::$err);
        }
        if ($userInfo['password'] != password($data['password'])) {
            return jsons([],'1002','原密码错误');
        }
        // 更新密码
        $map['password'] = password($data['newPassword']);
        $resId = SysUserServer::uploadInfo($uid,$map);
        if ($resId == false) {
            return jsons([],'1003',SysUserServer::$err);
        }
        return jsons($resId);
    }
}