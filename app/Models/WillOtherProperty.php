<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WillOtherProperty extends Model
{
    use HasFactory;

    public function getType(){
        switch ($this->type) {
            case 1:
                return 'Luxury Furniture';
                break;
            
            case 2:
                return 'Electronic';
                break;
            
            case 3:
                return 'Art';
                break;
            
            case 4:
                return 'Collectibles';
                break;
            
            case 5:
                return 'Household';
                break;
            
            case 6:
                return 'Clothes';
                break;
            
            default:
                return '';
                break;
        }
    }
}
