<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Will;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function gatewayPayment(){
        $stripe = new \Stripe\StripeClient(env("STRIPE_SK"));
        $payment = $stripe->checkout->sessions->create([
            'success_url' => url('gateway/success'),
            'cancel_url' => url('gateway/cancel'),
            'customer_email' => auth()->user()->email,
            'line_items' => [
                [
                    'price_data' => [
                        'currency'     => 'MYR',
                        'product_data' => [
                            "name" => 'E-Will Writing Service'
                        ],
                        'unit_amount'  => 40000,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode' => 'payment',
        ]);

        if($payment->url){
            session(['stripe_id' => $payment->id]);

            return [
                'status' => 'success',
                'url' => $payment->url,
            ];
        }
    }

    public function paymentSuccess(){
        $stripe = new \Stripe\StripeClient(env("STRIPE_SK"));
        $payment = $stripe->checkout->sessions->retrieve(session()->get('stripe_id'),[]);
        
        if($payment->status == 'complete' && $payment->payment_status == 'paid'){
            $will = new Will;
            $will->status = 1;
            $will->user_id = auth()->user()->id;
            $will->remark = 'Will created';
    
            if($will->save()){
                $transaction = new Transaction;
                $transaction->will_id = $will->id;
                $transaction->amount = 400.00;
                $transaction->paid = 400.00;
                $transaction->ref_id = session()->get('stripe_id');
    
                if($transaction->save()){
                    session()->forget('stripe_id');
                    $message = 'Your payment is successful.';
                    $will_id = $will->id;
                    return view('backend.user.payment-return', compact('message', 'will_id'));
                }
            }
        }
    }

    public function paymentFail(){
        $message = "Your payment is failed!";
        session()->forget('stripe_id');
        $will_id = NULL;
        return view('backend.user.payment-return', compact('message', 'will_id'));
    }
}
