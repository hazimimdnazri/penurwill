<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    use HasFactory;

    public function r_state(){
        return $this->belongsTo(LState::class, 'state_id');
    }
}
