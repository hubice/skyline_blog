<?php
namespace app\test\controller;

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
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
            $response = $payment->create($this->apiContext,null,[
                "Authorization" => "Bearer ".$this->autoToken['access_token']
            ]);
            $approvalUrl = $payment->getApprovalLink();
            return json_encode(array(
                'code' => 0,
                'id' => $response->getId(),
                'msg' => ''
            ));
        } catch (\Exception $e) {
            die($e);
        }
    }

    //完成下单
    public function executepayment() {
        $paymentID = input("paymentID");
        $payerID = input("payerID");
        $payment = Payment::get($paymentID,$this->apiContext,null,[
            "Authorization" => "Bearer ".$this->autoToken['access_token']
        ]);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerID);

        //发送
        try {
            $res = $payment->execute($execution,$this->apiContext,null,[
                "Authorization" => "Bearer ".$this->autoToken['access_token']
            ]);
            // 里面是数据
            var_dump($res);
            die;
        } catch (\Exception $e) {
            die($e);
        }
    }

    public function resSuccess() {
        var_dump("你成功了");
        die;
    }

    public function resCancel() {
        var_dump("你取消了付款");
        die;
    }

    // -----------------

    public function autoToken() {
        if (!empty(cache("Token"))) {
            $this->autoToken = json_decode(cache("Token"),true);
            return;
        }

        $path = "https://api.paypal.com";

        $configAll = $this->apiContext->getConfig();
        if ($configAll['mode'] == "sandbox")
            $path = "https://api.sandbox.paypal.com";

        $path .= "/v1/oauth2/token";

        $res = $this->curl($path,http_build_query([
            'grant_type' => 'client_credentials'
        ]),[
            "Accept: application/json",
            "Accept-language: en_US",
            "Cache-control: no-cache",
            "Content-type: application/x-www-form-urlencoded",
            "Authorization: Basic ".base64_encode("AcEO-n5A0vS98xv9WaTBzT5CuYj3_j14-L-_lgBVFrkN8zWYkRKRbrIwhxwi1cjiV-34G39h4pVY7iV6:EAz3ysJE5P5NygcVv8q5y4x-T2G2LckmaaDNE0TLNG6PuUDOGNJQhVKKevdQrwA4_xst2BxLhqXoqf28")
        ]);

        cache("Token",$res,['expire' => 3500]);
        $this->autoToken = json_decode($res,true);
    }

    // curl
    private function Curl($path,$post_data,$headers = []) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$path);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }

}


