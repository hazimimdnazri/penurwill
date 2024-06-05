<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WillInsurance extends Model
{
    use HasFactory;

    public function getType(){
        switch ($this->type) {
            case 1:
                return 'Life Insurance';
                break;
            
            case 2:
                return 'Health Insurance';
                break;
            
            case 3:
                return 'Takaful';
                break;
            
            default:
                return '';
                break;
        }
    }
}
