<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Will;
use App\Models\LState;
use App\Models\LBank;
use App\Models\WillBeneficiary;
use App\Models\WillBank;
use App\Models\WillInvestment;
use App\Models\WillInsurance;
use App\Models\WillBusiness;
use App\Models\WillHirePurchase;
use App\Models\WillJewelry;
use App\Models\WillOtherProperty;

class WillController extends Controller
{
    public function myWill(){
        $will = Will::where('user_id', auth()->user()->id)->first();
        if($will){
            return redirect(url('client/my-will/'.$will->id));
        }
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

        switch ($request->tab) {
            case 'personal':                
                return view('backend.user.wills.components.tab-'.$request->tab, compact('states',));
                break;
            
            case 'financial':
                $bankings = WillBank::where('will_id', auth()->user()->r_will->id)->get();
                return view('backend.user.wills.components.tab-'.$request->tab, compact('bankings'));
                break;
            
            case 'property':                
                return view('backend.user.wills.components.tab-'.$request->tab);
                break;
            
            case 'dnl':                
                return view('backend.user.wills.components.tab-'.$request->tab);
                break;
            
            case 'testament':                
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

    public function modalBeneficiary(Request $request){
        $beneficiary = isset($request->id) ? WillBeneficiary::findorfail($request->id) : new WillBeneficiary;
        $states = LState::all();
        return view('backend.user.wills.components.modal-beneficiary', compact('states', 'beneficiary'));
    }

    public function modalBeneficiaryAdd(Request $request){
        $beneficiaries = WillBeneficiary::where('will_id', auth()->user()->r_will->id)->get();
        $item_id = $request->item_id;
        $beneficiary_id = $request->id;

        switch ($request->modal){
            case 'banking':
                $beneficiary = $beneficiary_id ? json_decode(WillBank::findorfail($item_id)->beneficiaries, true)[$beneficiary_id] : NULL;

                if($request->action == 'delete'){
                    $item = WillBank::findorfail($item_id);
                }
                break;
            
            default:
                break;
        }

        if($request->action == 'delete'){
            $arr = json_decode($item->beneficiaries, true);
            unset($arr[$request->id]);

            $item->beneficiaries = $arr;
            if($item->save()){
                return [
                    'status' => 'success',
                    'message' => 'Beneficiary has been deleted.'
                ];
            }
        }

        return view('backend.user.wills.components.modal-beneficiary-add', compact('beneficiaries', 'item_id', 'beneficiary', 'beneficiary_id'));
    }

    public function storeBeneficiaryAdd(Request $request){
        $arr = [
            $request->beneficiary_id => [
                'percentage' => $request->percentage,
                'remark' => $request->remark,
            ]
        ];

        switch ($request->tab) {
            case 'banking':
                $item = WillBank::findorfail($request->item_id);
                if($item->beneficiaries){
                    $ex = json_decode($item->beneficiaries, true)[$request->beneficiary_id] ?? NULL;

                    if($ex){
                        $new = json_decode($item->beneficiaries, true);
                        $new[$request->beneficiary_id]['percentage'] = $request->percentage;
                        $new[$request->beneficiary_id]['remark'] = $request->remark;
                        $arr = $new;

                    } else {
                        $arr = json_decode($item->beneficiaries, true);
                        $arr[$request->beneficiary_id] = [
                            'percentage' => $request->percentage,
                            'remark' => $request->remark,
                        ];
                    }
                }
                
                break;
            
            default:
                break;
        }

        $item->beneficiaries = $arr;
        if($item->save()){
            return [
                'status' => 'success',
                'message' => 'Beneficiary has been saved.'
            ];
        }
    }

    public function storeBeneficiary(Request $request){
        $beneficiary = isset($request->beneficiary_id) ? WillBeneficiary::findorfail($request->beneficiary_id) : new WillBeneficiary;
        $beneficiary->name = strtoupper($request->name);
        $beneficiary->will_id = auth()->user()->r_will->id;
        $beneficiary->ic = $request->ic;
        $beneficiary->phone_mobile = $request->phone_mobile;
        $beneficiary->address_1 = strtoupper($request->address_1);
        $beneficiary->address_2 = strtoupper($request->address_2);
        $beneficiary->address_3 = strtoupper($request->address_3);
        $beneficiary->zipcode = $request->zipcode;
        $beneficiary->city = strtoupper($request->city);
        $beneficiary->state_id = $request->state_id;

        if($beneficiary->save()){
            return [
                'status' => 'success',
                'message' => 'Beneficiary has been saved.'
            ];
        }
    }

    public function modalBanking(Request $request){
        $bank = isset($request->id) ? WillBank::findorfail($request->id) : new WillBank;
        $banks = LBank::all();
        return view('backend.user.wills.components.modal-banking', compact('banks', 'bank'));
    }

    public function storeBanking(Request $request){
        $bank = isset($request->id) ? WillBank::findorfail($request->id) : new WillBank;
        $bank->bank_id = $request->bank_id;
        $bank->will_id = auth()->user()->r_will->id;
        $bank->branch = strtoupper($request->branch);
        $bank->account_number = strtoupper($request->account_number);
        $bank->amount = strtoupper($request->amount);

        if($bank->save()){
            return [
                'status' => 'success',
                'message' => 'Banking information has been saved.'
            ];
        }
    }

    public function modalInvestment(Request $request){
        $investment = isset($request->id) ? WillInvestment::findorfail($request->id) : new WillInvestment;
        return view('backend.user.wills.components.modal-investment', compact('investment'));
    }

    public function storeInvestment(Request $request){
        return $request;
    }

    public function modalBusiness(Request $request){
        $business = isset($request->id) ? WillBusiness::findorfail($request->id) : new WillBusiness;
        return view('backend.user.wills.components.modal-business', compact('business'));
    }

    public function storeBusiness(Request $request){
        return $request;
    }

    public function modalInsurance(Request $request){
        $insurance = isset($request->id) ? WillInsurance::findorfail($request->id) : new WillInsurance;
        return view('backend.user.wills.components.modal-insurance', compact('insurance'));
    }

    public function storeInsurance(Request $request){
        return $request;
    }

    public function modalHirePurchase(Request $request){
        $hire_purchase = isset($request->id) ? WillHirePurchase::findorfail($request->id) : new WillHirePurchase;
        $banks = LBank::all();
        return view('backend.user.wills.components.modal-hire-purchase', compact('hire_purchase', 'banks'));
    }

    public function storeHirePurchase(Request $request){
        return $request;
    }

    public function modalJewelry(Request $request){
        $jewelry = isset($request->id) ? WillJewelry::findorfail($request->id) : new WillJewelry;
        return view('backend.user.wills.components.modal-jewelry', compact('jewelry'));
    }

    public function storeJewelry(Request $request){
        return $request;
    }

    public function modalPropertyOther(Request $request){
        $property = isset($request->id) ? WillOtherProperty::findorfail($request->id) : new WillOtherProperty;
        return view('backend.user.wills.components.modal-property-other', compact('property'));
    }

    public function storePropertyOther(Request $request){
        return $request;
    }

    public function modalDigital(Request $request){
        return view('backend.user.wills.components.modal-digital');
    }

    public function storeDigital(Request $request){
        return $request;
    }

    public function modalEstate(Request $request){
        $banks = LBank::all();
        $states = LState::all();
        return view('backend.user.wills.components.modal-estate', compact('banks', 'states'));
    }

    public function storeEstate(Request $request){
        return $request;
    }

    public function modalDebt(Request $request){
        $banks = LBank::all();
        return view('backend.user.wills.components.modal-debt', compact('banks'));
    }

    public function storeDebt(Request $request){
        return $request;
    }
}
