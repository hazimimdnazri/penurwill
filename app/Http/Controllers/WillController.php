<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WillController extends Controller
{
    public function myWill(){
        return view('backend.user.wills.will-user');
    }

    public function modalCreate(Request $request){
        return view('backend.user.wills.components.modal-create');
    }

    public function willDetails($id){
        return view('backend.user.wills.will-details');
    }
}
