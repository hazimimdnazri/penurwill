<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Will extends Model
{
    use HasFactory;
    use HasUuids;

    public function r_executors(){
        return $this->hasMany(WillExecutor::class, 'will_id');
    }

    public function r_witnesses(){
        return $this->hasMany(WillWitness::class, 'will_id');
    }

    public function r_estates(){
        return $this->hasMany(WillRealEstate::class, 'will_id');
    }

    public function r_investments(){
        return $this->hasMany(WillInvestment::class, 'will_id');
    }

    public function r_debts(){
        return $this->hasMany(WillDebt::class, 'will_id');
    }

    public function r_banks(){
        return $this->hasMany(WillBank::class, 'will_id');
    }

    public function r_jewelries(){
        return $this->hasMany(WillJewelry::class, 'will_id');
    }

    public function r_others(){
        return $this->hasMany(WillOtherProperty::class, 'will_id');
    }

    public function r_insurances(){
        return $this->hasMany(WillInsurance::class, 'will_id');
    }

    public function r_businesses(){
        return $this->hasMany(WillBusiness::class, 'will_id');
    }

    public function r_digitals(){
        return $this->hasMany(WillDigitalAsset::class, 'will_id');
    }

    public function r_benefits(){
        return $this->hasMany(WillBenefit::class, 'will_id');
    }
}
