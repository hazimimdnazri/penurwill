<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Will;

class TransactionController extends Controller
{
    public function gatewayPayment(){
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
}
