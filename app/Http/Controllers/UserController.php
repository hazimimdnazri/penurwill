<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerDetail;
use App\Models\LState;

class UserController extends Controller
{
    public function dashboard(){
        return view('backend.user.dashboard');
    }

    public function modalDetails(Request $request){
        $states = LState::all();
        $details = CustomerDetail::where('user_id', auth()->user()->id)->first() ?? new CustomerDetail;
        return view('backend.user.components.modal-details', compact('details', 'states'));
    }

    public function pay(){

    }

    public function storeDetails(Request $request){
        $details = CustomerDetail::where('user_id', auth()->user()->id)->first() ?? new CustomerDetail;
        $details->user_id = auth()->user()->id;
        $details->ic = $request->ic;
        $details->phone_mobile = $request->phone_mobile;
        $details->phone_home = $request->phone_home;
        $details->address_1 = strtoupper($request->address_1);
        $details->address_2 = strtoupper($request->address_2);
        $details->address_3 = strtoupper($request->address_3);
        $details->zipcode = $request->zipcode;
        $details->city = strtoupper($request->city);
        $details->state_id = $request->state_id;

        if($details->save()){
            return [
                'status' => 'success',
                'message' => 'Details has been saved.'
            ];
        }
    }
}
