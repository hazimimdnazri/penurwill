<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WillJewelry extends Model
{
    use HasFactory;

    public function getType(){
        switch ($this->type) {
            case 1:
                return 'Necklace';
                break;
            
            case 2:
                return 'Ring';
                break;
            
            case 3:
                return 'Bracelet';
                break;
            
            case 4:
                return 'Others';
                break;
            
            default:
                return '';
                break;
        }
    }
}
