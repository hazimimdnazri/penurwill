<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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
                return redirect('dashboard');
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
