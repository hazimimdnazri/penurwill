<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Will;
use App\Models\User;
use App\Models\CustomerDetail;
use App\Models\LState;
use App\Models\LBank;
use App\Models\WillBeneficiary;
use App\Models\WillBank;
use App\Models\WillInvestment;
use App\Models\WillInsurance;
use App\Models\WillBusiness;
use App\Models\WillRealEstate;
use App\Models\WillHirePurchase;
use App\Models\WillJewelry;
use App\Models\WillOtherProperty;
use App\Models\WillDigitalAsset;
use App\Models\WillExecutor;
use App\Models\WillWitness;
use App\Models\WillDebt;
use App\Models\WillBenefit;
use App\Models\WillTestament;
use Barryvdh\DomPDF\Facade\Pdf;

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
                $investments = WillInvestment::where('will_id', auth()->user()->r_will->id)->get();
                $business = WillBusiness::where('will_id', auth()->user()->r_will->id)->get();
                $insurances = WillInsurance::where('will_id', auth()->user()->r_will->id)->get();
                return view('backend.user.wills.components.tab-'.$request->tab, compact('bankings', 'investments', 'business', 'insurances'));
                break;
            
            case 'property':
                $estates = WillRealEstate::where('will_id', auth()->user()->r_will->id)->get();
                $hire_purchases = WillHirePurchase::where('will_id', auth()->user()->r_will->id)->get();
                $jewelries = WillJewelry::where('will_id', auth()->user()->r_will->id)->get();
                $others = WillOtherProperty::where('will_id', auth()->user()->r_will->id)->get();
                $digitals = WillDigitalAsset::where('will_id', auth()->user()->r_will->id)->get();
                return view('backend.user.wills.components.tab-'.$request->tab, compact('estates', 'hire_purchases', 'jewelries', 'others', 'digitals'));
                break;
            
            case 'dnl':
                $debts = WillDebt::where('will_id', auth()->user()->r_will->id)->get();        
                return view('backend.user.wills.components.tab-'.$request->tab, compact('debts'));
                break;
            
            case 'benefit':
                $benefits = WillBenefit::where('will_id', auth()->user()->r_will->id)->get();
                return view('backend.user.wills.components.tab-'.$request->tab, compact('benefits'));
                break;
            
            case 'testament':                
                $testament = WillTestament::where('will_id', auth()->user()->r_will->id)->first() ?? new WillTestament;
                return view('backend.user.wills.components.tab-'.$request->tab, compact('testament'));
                break;
            
            case 'executor':                
                $executors = WillExecutor::where('will_id', auth()->user()->r_will->id)->get();
                return view('backend.user.wills.components.tab-'.$request->tab, compact('executors'));
                break;
            
            case 'witness':
                $witnesses = WillWitness::where('will_id', auth()->user()->r_will->id)->get();
                return view('backend.user.wills.components.tab-'.$request->tab, compact('states', 'witnesses', 'will'));
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

    public function validateBeneficiary($request){
        $barr = [];

        if(isset($request->ben_id[0])){
            for($i = 0; $i < count($request->ben_id); $i++){
                $barr[$request->ben_id[$i]] = [
                    'percentage' => (int)$request->ben_per[$i] ?? 100,
                    'remark' => $request->ben_remark[$i],
                ];
            }
            return [
                'status' => 'success',
                'data' => json_encode($barr)
            ];
        } else {
            return [
                'status' => 'error'
            ];
        }
    }

    public function storePersonal(Request $request){
        $user = User::findorfail(auth()->user()->id);
        $user->name = $request->name;

        if($user->save()){
            $details = CustomerDetail::findorfail(auth()->user()->r_details->id);
            $details->ic = $request->ic;
            $details->phone_home = $request->phone_home;
            $details->phone_mobile = $request->phone_mobile;
            $details->gender = $request->gender;
            $details->marital_status = $request->marital_status;
            $details->address_1 = $request->address_1;
            $details->address_2 = $request->address_2;
            $details->address_3 = $request->address_3;
            $details->zipcode = $request->zipcode;
            $details->city = $request->city;
            $details->state_id = $request->state_id;

            if($details->save()){
                return [
                    'status' => 'success',
                    'message' => 'User details has been saved.'
                ];
            }
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
        $beneficiaries = WillBeneficiary::where('will_id', auth()->user()->r_will->id)->get();
        $bank = isset($request->id) ? WillBank::findorfail($request->id) : new WillBank;
        $banks = LBank::all();
        return view('backend.user.wills.components.modal-banking', compact('banks', 'bank', 'beneficiaries'));
    }

    public function storeBanking(Request $request){
        $bank = isset($request->id) ? WillBank::findorfail($request->id) : new WillBank;
        $bank->bank_id = $request->bank_id;
        $bank->will_id = auth()->user()->r_will->id;
        $bank->branch = strtoupper($request->branch);
        $bank->account_number = strtoupper($request->account_number);
        $bank->amount = strtoupper($request->amount);

        if($this->validateBeneficiary($request)['status'] == 'error'){
            return [
                'status' => 'error',
                'message' => 'Please insert beneficiary information.'
            ];
        } else {
            $bank->beneficiaries = $this->validateBeneficiary($request)['data'];
        }

        if($bank->save()){
            return [
                'status' => 'success',
                'message' => 'Banking information has been saved.'
            ];
        }
    }

    public function modalInvestment(Request $request){
        $beneficiaries = WillBeneficiary::where('will_id', auth()->user()->r_will->id)->get();
        $investment = isset($request->id) ? WillInvestment::findorfail($request->id) : new WillInvestment;
        return view('backend.user.wills.components.modal-investment', compact('investment', 'beneficiaries'));
    }

    public function storeInvestment(Request $request){
        $investment = isset($request->id) ? WillInvestment::findorfail($request->id) : new WillInvestment;
        $investment->investment = strtoupper($request->investment);
        $investment->will_id = auth()->user()->r_will->id;
        $investment->type = $request->type;
        $investment->share_amount = $request->share_amount;
        $investment->share_percentage = $request->share_percentage;

        if($this->validateBeneficiary($request)['status'] == 'error'){
            return [
                'status' => 'error',
                'message' => 'Please insert beneficiary information.'
            ];
        } else {
            $investment->beneficiaries = $this->validateBeneficiary($request)['data'];
        }

        if($investment->save()){
            return [
                'status' => 'success',
                'message' => 'Investment information has been saved.'
            ];
        }
    }

    public function modalBusiness(Request $request){
        $beneficiaries = WillBeneficiary::where('will_id', auth()->user()->r_will->id)->get();
        $business = isset($request->id) ? WillBusiness::findorfail($request->id) : new WillBusiness;
        return view('backend.user.wills.components.modal-business', compact('business', 'beneficiaries'));
    }

    public function storeBusiness(Request $request){
        $business = isset($request->id) ? WillBusiness::findorfail($request->id) : new WillBusiness;
        $business->business = strtoupper($request->business);
        $business->will_id = auth()->user()->r_will->id;
        $business->registration_number = strtoupper($request->registration_number);
        $business->amount = $request->amount;

        if($this->validateBeneficiary($request)['status'] == 'error'){
            return [
                'status' => 'error',
                'message' => 'Please insert beneficiary information.'
            ];
        } else {
            $business->beneficiaries = $this->validateBeneficiary($request)['data'];
        }

        if($business->save()){
            return [
                'status' => 'success',
                'message' => 'Business information has been saved.'
            ];
        }
    }

    public function modalInsurance(Request $request){
        $insurance = isset($request->id) ? WillInsurance::findorfail($request->id) : new WillInsurance;
        return view('backend.user.wills.components.modal-insurance', compact('insurance'));
    }

    public function storeInsurance(Request $request){
        $insurance = isset($request->id) ? WillInsurance::findorfail($request->id) : new WillInsurance;
        $insurance->insurance = strtoupper($request->insurance);
        $insurance->provider = strtoupper($request->provider);
        $insurance->will_id = auth()->user()->r_will->id;
        $insurance->amount = $request->amount;
        $insurance->type = $request->type;

        if($insurance->save()){
            return [
                'status' => 'success',
                'message' => 'Insurance information has been saved.'
            ];
        }
    }

    public function modalHirePurchase(Request $request){
        $hire_purchase = isset($request->id) ? WillHirePurchase::findorfail($request->id) : new WillHirePurchase;
        $banks = LBank::all();
        return view('backend.user.wills.components.modal-hire-purchase', compact('hire_purchase', 'banks'));
    }

    public function storeHirePurchase(Request $request){
        $hire_purchase = isset($request->id) ? WillHirePurchase::findorfail($request->id) : new WillHirePurchase;
        $hire_purchase->brand = strtoupper($request->brand);
        $hire_purchase->model = strtoupper($request->model);
        $hire_purchase->will_id = auth()->user()->r_will->id;
        $hire_purchase->type = $request->type;
        $hire_purchase->year = $request->year;
        $hire_purchase->colour = strtoupper($request->colour);
        $hire_purchase->registration_number = strtoupper($request->registration_number);
        $hire_purchase->bank_id = $request->bank_id;
        $hire_purchase->isOnLoan = $request->isOnLoan == 1 ? TRUE : FALSE;

        if($hire_purchase->save()){
            return [
                'status' => 'success',
                'message' => 'Hire purchase information has been saved.'
            ];
        }
    }

    public function modalJewelry(Request $request){
        $jewelry = isset($request->id) ? WillJewelry::findorfail($request->id) : new WillJewelry;
        return view('backend.user.wills.components.modal-jewelry', compact('jewelry'));
    }

    public function storeJewelry(Request $request){
        $jewelry = isset($request->id) ? WillJewelry::findorfail($request->id) : new WillJewelry;
        $jewelry->will_id = auth()->user()->r_will->id;
        $jewelry->type = $request->type;
        $jewelry->jewelry = strtoupper($request->jewelry);
        $jewelry->weight = $request->weight;
        $jewelry->quantity = $request->quantity ?? 1;

        if($jewelry->save()){
            return [
                'status' => 'success',
                'message' => 'Jewelry information has been saved.'
            ];
        }
    }

    public function modalPropertyOther(Request $request){
        $other = isset($request->id) ? WillOtherProperty::findorfail($request->id) : new WillOtherProperty;
        return view('backend.user.wills.components.modal-property-other', compact('other'));
    }

    public function storePropertyOther(Request $request){
        $other = isset($request->id) ? WillOtherProperty::findorfail($request->id) : new WillOtherProperty;
        $other->will_id = auth()->user()->r_will->id;
        $other->type = $request->type;
        $other->worth = $request->worth;
        $other->quantity = $request->quantity ?? 1;

        if($other->save()){
            return [
                'status' => 'success',
                'message' => 'Additional asset information has been saved.'
            ];
        }
    }

    public function modalDigital(Request $request){
        $digital = isset($request->id) ? WillDigitalAsset::findorfail($request->id) : new WillDigitalAsset;
        return view('backend.user.wills.components.modal-digital', compact('digital'));
    }

    public function storeDigital(Request $request){
        $digital = isset($request->id) ? WillDigitalAsset::findorfail($request->id) : new WillDigitalAsset;
        $digital->will_id = auth()->user()->r_will->id;
        $digital->type = $request->type;
        $digital->url = strtolower($request->url);
        $digital->asset = strtoupper($request->asset);
        $digital->provider = strtoupper($request->provider);

        if($digital->save()){
            return [
                'status' => 'success',
                'message' => 'Digital asset information has been saved.'
            ];
        }
    }

    public function modalEstate(Request $request){
        $estate = isset($request->id) ? WillRealEstate::findorfail($request->id) : new WillRealEstate;
        $banks = LBank::all();
        $states = LState::all();
        return view('backend.user.wills.components.modal-estate', compact('estate', 'banks', 'states'));
    }

    public function storeEstate(Request $request){
        $estate = isset($request->id) ? WillRealEstate::findorfail($request->id) : new WillRealEstate;
        $estate->branch = strtoupper($request->branch);
        $estate->account_number = strtoupper($request->account_number);
        $estate->will_id = auth()->user()->r_will->id;
        $estate->bank_id = $request->bank_id;
        $estate->type = $request->type;
        $estate->size = $request->size;
        $estate->address_1 = strtoupper($request->address_1);
        $estate->address_2 = strtoupper($request->address_2);
        $estate->address_3 = strtoupper($request->address_3);
        $estate->city = strtoupper($request->city);
        $estate->zipcode = $request->zipcode;
        $estate->state_id = $request->state_id;

        if($estate->save()){
            return [
                'status' => 'success',
                'message' => 'Real estate information has been saved.'
            ];
        }
    }

    public function modalDebt(Request $request){
        $debt = isset($request->id) ? WillDebt::findorfail($request->id) : new WillDebt;
        return view('backend.user.wills.components.modal-debt', compact('debt'));
    }

    public function storeDebt(Request $request){
        $debt = isset($request->id) ? WillDebt::findorfail($request->id) : new WillDebt;
        $debt->will_id = auth()->user()->r_will->id;
        $debt->name = strtoupper($request->name);
        $debt->remark = strtoupper($request->remark);
        $debt->amount = $request->amount;

        if($debt->save()){
            return [
                'status' => 'success',
                'message' => 'Debts and liabilities information has been saved.'
            ];
        }
    }

    public function modalBenefit(Request $request){
        $beneficiaries = WillBeneficiary::where('will_id', auth()->user()->r_will->id)->get();
        $benefit = isset($request->id) ? WillBenefit::findorfail($request->id) : new WillBenefit;
        return view('backend.user.wills.components.modal-benefit', compact('benefit', 'beneficiaries'));
    }

    public function storeBenefit(Request $request){
        $benefit = isset($request->id) ? WillBenefit::findorfail($request->id) : new WillBenefit;
        $benefit->will_id = auth()->user()->r_will->id;
        $benefit->remark = strtoupper($request->remark);
        $benefit->percentage = $request->percentage;
        $benefit->beneficiary_id = $request->beneficiary_id;

        if($benefit->save()){
            return [
                'status' => 'success',
                'message' => 'Beneficiary for future benefits information has been saved.'
            ];
        }
    }

    public function storeTestament(Request $request){
        $benefit = isset($request->id) ? WillTestament::findorfail($request->id) : new WillTestament;
        $benefit->will_id = auth()->user()->r_will->id;
        $benefit->testament = $request->testament;
        $benefit->remark = strtoupper($request->remark);

        if($benefit->save()){
            return [
                'status' => 'success',
                'message' => 'Last testament has been saved.'
            ];
        }
    }

    public function modalExecutor(Request $request){
        $states = LState::all();
        $beneficiaries = WillBeneficiary::where('will_id', auth()->user()->r_will->id)->get();
        $executor = isset($request->id) ? WillExecutor::findorfail($request->id) : new WillExecutor;
        return view('backend.user.wills.components.modal-executor', compact('states', 'executor', 'beneficiaries'));
    }

    public function getBeneficiary(Request $request){
        if($request->id != 0){
            $beneficiary = WillBeneficiary::findorfail($request->id);
            return [
                'status' => 'success',
                'data' => $beneficiary,
            ];
        }
    }

    public function storeExecutor(Request $request){
        $executor = isset($request->id) ? WillExecutor::findorfail($request->id) : new WillExecutor;
        $executor->name = strtoupper($request->name);
        $executor->ic = $request->ic;
        $executor->phone_mobile = $request->phone_mobile;
        $executor->phone_office = $request->phone_office;
        $executor->address_1 = strtoupper($request->address_1);
        $executor->address_2 = strtoupper($request->address_2);
        $executor->address_3 = strtoupper($request->address_3);
        $executor->city = strtoupper($request->city);
        $executor->zipcode = $request->zipcode;
        $executor->state_id = $request->state_id;
        $executor->will_id = auth()->user()->r_will->id;

        if($executor->save()){
            return [
                'status' => 'success',
                'message' => 'Executor information has been saved.'
            ];
        }
    }

    public function storeWitness(Request $request){
        for($i = 0; $i < 2; $i++){
            $witness = isset($request->id[$i]) ? WillWitness::findorfail($request->id[$i]) : new WillWitness;
            $witness->name = strtoupper($request->name[$i]);
            $witness->ic = $request->ic[$i];
            $witness->phone_mobile = $request->phone_mobile[$i];
            $witness->phone_home = $request->phone_home[$i];
            $witness->address_1 = strtoupper($request->address_1[$i]);
            $witness->address_2 = strtoupper($request->address_2[$i]);
            $witness->address_3 = strtoupper($request->address_3[$i]);
            $witness->zipcode = $request->zipcode[$i];
            $witness->city = strtoupper($request->city[$i]);
            $witness->state_id = $request->state_id[$i];
            $witness->will_id = auth()->user()->r_will->id;
            
            $witness->save();
        }

        return [
            'status' => 'success',
            'message' => 'Witness information has been saved.'
        ];
    }

    public function validateWill(Request $request){
        return [
            'status' => 'success',
            'will_id' => auth()->user()->r_will->id
        ];
    }

    public function willGenerate($id){
        $pdf = PDF::loadView('backend.user.wills.will-pdf')->setPaper('A4', 'portrait');
        return $pdf->stream('Generated Will.pdf');
    }
}
