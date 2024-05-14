<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;

class ApiController extends Controller
{
    public function users(){
        return DataTables::of(User::where('flag', '1')->get())->make(true);
    }
}
