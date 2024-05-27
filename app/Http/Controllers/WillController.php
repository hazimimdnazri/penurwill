<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Will;
use App\Models\LState;
use App\Models\LBank;

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

    public function loadTab(Request $request){
        $will = isset($request->will_id) ? Will::findorfail($request->will_id) : new Will;
        $states = LState::all();
        $banks = LBank::all();

        switch ($request->tab) {
            case 'personal':                
                return view('backend.user.wills.components.tab-'.$request->tab, compact('states', 'banks'));
                break;
            
            case 'financial':                
                return view('backend.user.wills.components.tab-'.$request->tab);
                break;
            
            case 'property':                
                return view('backend.user.wills.components.tab-'.$request->tab);
                break;
            
            case 'witness':                
                return view('backend.user.wills.components.tab-'.$request->tab, compact('states', 'banks'));
                break;
            
            default:
                return view('backend.user.wills.components.tab-construction');
                break;
        }
    }
}
