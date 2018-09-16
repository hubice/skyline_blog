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

    //完成下单
    public function executepayment() {

    }

    public function _initialize()
    {
        $this->initEnv();
    }

    // 初始化
    private function initEnv() {
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                "ACEO-n5A0vS98xv9WaTBzT5CuYj3_j14-L-_lgBVFrkN8zWYkRKRbrIwhxwi1cjiV-34G39h4pVY7iV6",
                'EAz3ysJE5P5NygcVv8q5y4x-T2G2LckmaaDNE0TLNG6PuUDOGNJQhVKKevdQrwA4_xst2BxLhqXoqf28'
            )
        );
        $apiContext->setConfig([
                'mode' => 'sandbox '
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
            $payment->create($this->apiContext);
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

    public function resSuccess() {

    }

    public function resCancel() {

    }
}
