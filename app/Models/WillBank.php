<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WillBank extends Model
{
    use HasFactory;

    public function r_bank(){
        return $this->belongsTo(LBank::class, 'bank_id');
    }
}
