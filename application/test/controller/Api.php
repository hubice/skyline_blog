<?php
namespace app\test\controller;

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use think\Controller;

class Api extends Controller
{
    private $apiContext;
    private $autoToken;

    public function _initialize()
    {
        $this->initEnv();
        $this->autoToken();
    }

    // 初始化
    private function initEnv() {
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                "ACEO-n5A0vS98xv9WaTBzT5CuYj3_j14-L-_lgBVFrkN8zWYkRKRbrIwhxwi1cjiV-34G39h4pVY7iV6",
             "EAz3ysJE5P5NygcVv8q5y4x-T2G2LckmaaDNE0TLNG6PuUDOGNJQhVKKevdQrwA4_xst2BxLhqXoqf28"
            )
        );
        $apiContext->setConfig([
            'mode' => 'sandbox'
        ]);

        $this->apiContext = $apiContext;
    }

    // 下单
    public function createpayment()
    {
        //支付方式
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        //回调
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(url("test/Api/resSuccess",'',false,true))
            ->setCancelUrl(url("test/Api/resCancel",'',false,true));

        // 支付
        $amout = new Amount();
        $amout->setCurrency("USD")
            ->setTotal(10);
        $transaction = new Transaction();
        $transaction->setAmount($amout)
            ->setDescription("Payment description");

        //整合数据
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        //发送
        try {
            $payment->create($this->apiContext,null,[
                "Authorization" => ($this->autoToken)['access_token']
            ]);
            $approvalUrl = $payment->getApprovalLink();
            return json_encode(array(
                'code' => 0,
                'id' => $approvalUrl,
                'msg' => ''
            ));
        } catch (\Exception $e) {
            die($e);
        }
    }

    //完成下单
    public function executepayment() {

    }

    public function resSuccess() {

    }

    public function resCancel() {

    }

    // -----------------

    public function autoToken() {
        if (!empty(cache("Token"))) {
            $this->autoToken = cache("Token");
            return;
        }

        $path = "https://api.paypal.com";

        $configAll = $this->apiContext->getConfig();
        if ($configAll['mode'] == "sandbox")
            $path = "https://api.sandbox.paypal.com";

        $path .= "/v1/oauth2/token";

        $res = $this->curl($path,[
            'grant_type' => 'client_credentials'
        ],[
            'Accept: application/json',
            'Accept-Language: en_US',
            'Content-Type: application/x-www-form-urlencoded'
        ],"ACEO-n5A0vS98xv9WaTBzT5CuYj3_j14-L-_lgBVFrkN8zWYkRKRbrIwhxwi1cjiV-34G39h4pVY7iV6:EAz3ysJE5P5NygcVv8q5y4x-T2G2LckmaaDNE0TLNG6PuUDOGNJQhVKKevdQrwA4_xst2BxLhqXoqf28");

        cache("Token",$res,['expire' => 3500]);

        var_dump($res);
        die;
        $this->autoToken = $res;
    }

    // curl
    private function Curl($path,$post_data,$headers = [],$basicAuth = "") {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$path);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($curl, CURLOPT_USERPWD, $basicAuth);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }

}

