<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WillDigitalAsset extends Model
{
    use HasFactory;

    public function getType(){
        switch ($this->type) {
            case 1:
                return 'Social Media Account';
                break;
            
            case 2:
                return 'Domain Name';
                break;
            
            case 3:
                return 'Web Hosting';
                break;
            
            case 4:
                return 'Virtual Private Server';
                break;
            
            case 5:
                return 'Others';
                break;
            
            default:
                return '';
                break;
        }
    }
}
