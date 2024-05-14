<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

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
                return [
                    'status' => 'success',
                    'message' => 'User has been deactivated.'
                ];
            }
        }
        
        return view('backend.admin.management.components.modal-user', compact('user'));
    }

    public function storeUser(Request $request){
        $ex = User::where('email', $request->email)->first();

        if(isset($request->id)){
            $user = User::findorfail($request->id);
        } else {
            $user = new User;
            $user->password = Hash::make(123456);
            $user->date_verified = date('Y-m-d H:i:s');
        }

        if($ex && $ex->email != $user->email){
            return [
                'status' => 'error',
                'message' => 'E-mail already exist in the system.'
            ];
        }

        $user->name = strtoupper($request->name);
        $user->email = $request->email;
        $user->role = $request->role;
        $user->date_verified = date('Y-m-d H:i:s');
    
        if($user->save()){
            return [
                'status' => 'success',
                'message' => 'User information has been saved.'
            ];
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

    public function resetPassword(Request $request){
        $user = User::findorfail($request->id);
        $user->password = Hash::make(123456);
        $user->date_password = NULL;

        if($user->save()){
            return [
                'status' => 'success',
                'message' => 'Password has been reset to 123456'
            ];
        }
    }
}
