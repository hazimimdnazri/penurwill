<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WillRealEstate extends Model
{
    use HasFactory;

    public function r_bank(){
        return $this->belongsTo(LBank::class, 'bank_id');
    }

    public function getType(){
        switch ($this->type) {
            case 1:
                return 'House (Lot)';
                break;
            
            case 2:
                return 'House (Semi-D)';
                break;
            
            case 3:
                return 'House (Bungalow)';
                break;
            
            case 4:
                return 'House (Terrace)';
                break;
            
            case 5:
                return 'House (Apartment)';
                break;
            
            case 6:
                return 'Land';
                break;
            
            case 7:
                return 'Commercial Building';
                break;
            
            case 8:
                return 'Others';
                break;
            
            default:
                return '';
                break;
        }
    }
}
