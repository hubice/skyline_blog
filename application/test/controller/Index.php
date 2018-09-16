<?php
namespace app\test\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function putCheck() {
        file_put_contents("/paypal.debug",$_POST);
    }
}
