<?php
namespace app\test\controller;

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use think\Controller;
use think\Request;

class Index extends Controller
{
    public $apiContext;
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

    public function _initialize()
    {
        $this->apiContext = new ApiContext(
            "AcEO-n5A0vS98xv9WaTBzT5CuYj3_j14-L-_lgBVFrkN8zWYkRKRbrIwhxwi1cjiV-34G39h4pVY7iV6",
            "EAz3ysJE5P5NygcVv8q5y4x-T2G2LckmaaDNE0TLNG6PuUDOGNJQhVKKevdQrwA4_xst2BxLhqXoqf28"
        );
    }

    public function auto() {

    }

    // 点击按钮
    // 需要去请求paypal接口
    public function ApiCreatePayment() {
        //file_put_contents("paypal.debug",json_encode(input("")));

        $paymentID = input("post.paymentID");
        $payerID = input("post.payerID");

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $redirectUrls = new RedirectUrls();

        $redirectUrls->setReturnUrl(url("test/index/CheckSuccess",'',false,true))
            ->setCancelUrl(url("test/index/CheckCancel",'',false,true));

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(9);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription("你支付的详情！");

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        // ---------------------

        try {
            $payment->create($this->apiContext);

            $approvalUrl = $payment->getApprovalLink();

        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (\Exception $ex) {
            die($ex);
        }


    }

    public function CheckSuccess() {
        //file_put_contents("paypal.debug",json_encode(input("")));

        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $this->apiContext);
        $payerId = $_GET['PayerID'];

        // Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            // Execute payment
            $result = $payment->execute($execution, $this->apiContext);
            var_dump($result);
        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (\Exception $ex) {
            die($ex);
        }
    }

    public function CheckCancel() {
        //file_put_contents("paypal.debug",json_encode(input("")));
    }
}
