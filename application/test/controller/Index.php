<?php
namespace app\test\controller;

use think\Controller;

class Index extends Controller
{
    // 第一种
    public function index()
    {
        return $this->fetch();
    }

    // 第二种
    public function index2()
    {
        return $this->fetch();
    }
}
