<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Will;

class TransactionController extends Controller
{
    public function gatewayPayment(){
        $stripe = new \Stripe\StripeClient(env("STRIPE_SK"));
        $payment = $stripe->checkout->sessions->create([
            'success_url' => url('gateway/success'),
            'cancel_url' => url('gateway/cancel'),
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

        return [
            'status' => 'success',
            'url' => $payment->url
        ];
    }

    public function paymentSuccess(){
        $will = new Will;
        $will->status = 2;
        $will->user_id = auth()->user()->id;
        $will->remark = 'Will created';

        if($will->save()){
            $message = "Your payment is successfull!";
            $will_id = $will->id;
            return view('backend.user.payment-return', compact('message', 'will_id'));
        }
    }

    public function paymentFail(){
        $message = "Your payment is failed!!";
        $will_id = NULL;
        return view('backend.user.payment-return', compact('message', 'will_id'));
    }
}
