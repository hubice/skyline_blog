<?php
namespace app\test\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function check() {
        file_put_contents("paypal.debug",json_encode(input("")));
        var_dump(input(""));
        die;
    }
}
