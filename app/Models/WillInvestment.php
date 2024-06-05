<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WillInvestment extends Model
{
    use HasFactory;

    public function getType(){
        switch ($this->type) {
            case 1:
                return 'Stocks';
                break;
            
            case 2:
                return 'Bonds';
                break;
            
            case 3:
                return 'Mutual Funds';
                break;
            
            case 4:
                return 'Brokerage Account';
                break;
            
            default:
                return '';
                break;
        }
    }
}
