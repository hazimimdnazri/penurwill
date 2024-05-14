<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManagementController extends Controller
{
    public function users(){
        return view('backend.admin.management.users');
    }

    public function modalUser(Request $request){
        $user = isset($request->id) ? User::findorfail($request->id) : new User;

        if($request->action == 'delete'){
            $user->flag = '0';
            if($user->save()){
                return 'success';
            }
        }
        
        return view('backend.admin.management.components.modal-user', compact('user'));
    }

    public function storeUser(Request $request){
        $user = isset($request->id) ? User::findorfail($request->id) : new User;

        $user->role = $request->role;
    
        if($user->save()){
            return 'success';
        }
    }

    public function actionUser(Request $request){
        $user = User::findorfail($request->id);
        $user->isLocked = $request->aid == 0 ? TRUE : FALSE;

        if($user->save()){
            return [
                'status' => 'success',
                'message' => $request->aid == 0 ? 'The account has been locked.' : 'The account has been unlocked.'
            ];
        }
    }
}
