<?php

namespace App\Modules\Carts\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Carts\Models\Paypalpay;
use Paypalpayment;
use Gloudemans\Shoppingcart\Facades\Cart;

use Session;


class PaypalPaymentController extends Controller 
{   
    private $_apiContext;

    function __construct(){
        // dd(config('paypal_payment.Account.ClientSecret'));
        $this->_apiContext = Paypalpayment::apiContext(
            config('paypal_payment.Account.ClientId'),
            config('paypal_payment.Account.ClientSecret'));
        $this->_apiContext->setConfig(array(
            'mode' => 'live'
        ));
    }

    public function callback(Request $request)
    {
      

        if($request->input('success') == 'true'){
            $pay_id = session()->get('my_payment_id');
            
            $pay_id = $request->input('order_id');

            $paymentId = $request->input('paymentId');
            $PayerID = $request->input('PayerID');
            $payment = Paypalpayment::getById($paymentId, $this->_apiContext);

            // PaymentExecution object includes information necessary 
            // to execute a PayPal account payment. 
            // The payer_id is added to the request query parameters
            // when the user is redirected from paypal back to your site
            $execution = Paypalpayment::PaymentExecution();
            $execution->setPayerId($PayerID);

            //Execute the payment
            $payment->execute($execution,$this->_apiContext);


            $my_paypal = \App\Paypalpay::find($pay_id);

            $my_paypal->status =1;
            $my_paypal->save();

            session()->put('message', 'Payment successful!');

        }else{
            session()->put('message', 'Payment unsuccessful!!!');
        }

        return redirect()->to(url('/home'));
    
    }

   
    public function store(Request $request)
    {

        // dd($request->all());
 
    $error = 0;
    $user = null;
    if(Session::has('error_code')):
        $error = 1;
    endif;
    if(Session::has('user')):
      $user = Session::get('user');
    endif;


      $type = $request->input('type');
     
     
      if($type==1){ 

        $pay= $user->id;
      
        $payments= Paypalpay::where(['customer_id'=>$user->id])->get();


        $payments = Paypalpay::create([
            'customer_id'=>$pay,
             'type'=>1
            ]);
       
        $payments->save();

        $order_id = $payments->id;
       
        session()->put('my_payment_id',$payments->id);      

       
        $total_price =  number_from_format(Cart::total());



        $payer = Paypalpayment::payer();

        $payer->setPaymentMethod("paypal");

        $item1 = Paypalpayment::item();
        $item1->setName('Sponser Fee')
        ->setDescription('Sponser Fee')
        ->setCurrency('AUD')
        ->setQuantity(1)
        ->setTax(0)
        ->setPrice($total_price);

        $itemList = Paypalpayment::itemList();
        $itemList->setItems(array($item1));

        $details = Paypalpayment::details();
        $details->setShipping(0)
        ->setTax(0)
        ->setSubtotal($total_price);

        $amount = Paypalpayment::amount();
        $amount->setCurrency("AUD")
        ->setTotal($total_price)
        ->setDetails($details);

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Payment description")
        ->setInvoiceNumber(uniqid());

         $baseUrl = "http://localhost:8000";
    //    $baseUrl = "http://cityplumbltd.co.uk";
        $redirectUrls = Paypalpayment::redirectUrls();
        $redirectUrls->setReturnUrl("{$baseUrl}/callback?order_id=$order_id&success=true")
        ->setCancelUrl("{$baseUrl}/callback?success=false");

        $payment = Paypalpayment::payment();
        $payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));

        try {
            $payment->create($this->_apiContext);
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            \Log::error($ex);
        }

        // $approvalUrl = $payment->getApprovalLink();
        // echo "Created Payment Using PayPal. Please visit the URL to Approve.Payment <a href={$approvalUrl}>{$approvalUrl}</a>";
        // var_dump($payment->getApprovalLink());exit();


        return redirect()->to($payment->getApprovalLink());
        
    }

   
}

}
