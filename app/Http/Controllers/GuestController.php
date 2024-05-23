<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class GuestController extends Controller
{
    public function index(){
        return view('frontend.home');
    }

    public function home(){
        if(auth()->user()){
            if(in_array(auth()->user()->role, [2, 3])){
                return redirect('admin/dashboard');
            } else if(auth()->user()->role == 1) {
                return redirect('client/dashboard');
            }
        } else {
            return redirect('admin/dashboard');
        }
    }

    public function contactUs(){
        return view('frontend.contact');
    }

    public function login(){
        return view('backend.guest.login');
    }

    public function register(){
        return view('backend.guest.register');
    }

    public function modalPasswordRegistration(Request $request) : View | array {
        if(User::where('email', $request->email)->first()){
            return [
                'status' => 'error',
                'message' => 'E-mail already exist in the system.'
            ];
        } else if($request->email != $request->email_confirmation){
            return [
                'status' => 'error',
                'message' => 'Confirmation e-mail address is not the same as the e-mail address.'
            ];
        }

        $data = $request;
        return view('backend.guest.components.modal-password-registration', compact('data'));
    }

    public function storeRegistration(Request $request) : array {
        if($request->password >= 8){
            if($request->password == $request->password_confirmation){
                $user = new User;
                $user->name = strtoupper($request->name);
                $user->email = strtolower($request->email);
                $user->role = 1;
                $user->password = Hash::make($request->password_confirmation);
                $user->date_password = date('Y-m-d H:i:s');
                if($user->save()){
                    $token = new Token;
                    $token->user_id = $user->id;
                    $token->token = md5(uniqid());

                    if($token->save()){
                        return [
                            'message' => 'Your account has been registered, please check your e-mail and click on the activation link.',
                            'status' => 'success'
                        ];
                    }
                }
            } else {
                return [
                    'message' => 'The confirmed password is not the same as the password. ',
                    'status' => 'error'
                ];
            }
        } else {
            return [
                'message' => 'Please ensure that your password contains at least 8 characters.',
                'status' => 'error'
            ];
        }
    }

    public function submitLogin(Request $request) : array {
        if(auth()->attempt($request->only('email', 'password'))){

            if(auth()->user()->isLocked){
                auth()->logout();
                return [
                    'status' => 'error',
                    'message' => 'Your account has been locked, please contact the administartor.'
                ];
            } else if(!auth()->user()->date_verified){
                auth()->logout();
                return [
                    'status' => 'error',
                    'message' => 'Your account is still inactive, please check your email for activation link.'
                ];
            } else if(auth()->user()->flag == '0'){
                auth()->logout();
                return [
                    'status' => 'error',
                    'message' => 'Your account has been removed, please contact the administrator.'
                ];
            } else {
                return [
                    'status' => 'success',
                    'message' => ''
                ];
            }
        } else {
            return [
                'status' => 'error',
                'message' => 'Invalid login credential.'
            ];
        }
    }

    public function submitLogout(Request $request) : RedirectResponse {
        $request->session()->forget('location_id');
        auth()->logout();
        return redirect('guest/login');
    }
}
