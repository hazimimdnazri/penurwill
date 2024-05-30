<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WillBeneficiary;
use Yajra\DataTables\DataTables;

class ApiController extends Controller
{
    public function users(){
        return DataTables::of(User::where('flag', '1')->get())->make(true);
    }

    public function beneficiaries(){
        if(auth()->user()->role == 1){
            $beneficiaries = WillBeneficiary::where('will_id', auth()->user()->r_will->id)->get();
        } else {

        }
        return DataTables::of($beneficiaries)->make(true);
    }
}
