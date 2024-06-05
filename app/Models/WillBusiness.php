<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WillBusiness extends Model
{
    use HasFactory;

    public function getType(){
        switch ($this->type) {
            case 1:
                return 'Type 1';
                break;
            
            case 2:
                return 'Type 2';
                break;
            
            case 3:
                return 'Type 3';
                break;
            
            case 4:
                return 'Type 4';
                break;
            
            default:
                return '';
                break;
        }
    }
}
