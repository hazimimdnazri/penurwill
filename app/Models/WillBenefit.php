<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WillBenefit extends Model
{
    use HasFactory;

    public function r_beneficiary(){
        return $this->belongsTo(WillBeneficiary::class, 'beneficiary_id');
    }
}
