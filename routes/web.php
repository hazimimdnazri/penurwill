<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\WillController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GuestController::class, 'index']);
Route::get('contact-us', [GuestController::class, 'contactUs']);
Route::get('home', [GuestController::class, 'home']);
Route::get('logout', [GuestController::class, 'submitLogout'])->name('logout')->middleware('auth');

Route::group(['middleware' => ['guest'], 'prefix' => 'guest'], function(){
    Route::get('login', [GuestController::class, 'login'])->name('login');
    Route::post('login', [GuestController::class, 'submitLogin']);
    Route::get('register', [GuestController::class, 'register']);
    Route::post('register', [GuestController::class, 'submitRegister']);

    Route::group(['prefix' => 'ajax'], function(){
        Route::post('modal-password-registration', [GuestController::class, 'modalPasswordRegistration']);
        Route::post('store-registration', [GuestController::class, 'storeRegistration']);
    });
});

Route::group(['middleware' => ['auth', 'role: 3, 4'], 'prefix' => 'admin'], function(){
    Route::get('dashboard', [AdminController::class, 'dashboard']);
    Route::get('calendar', [AdminController::class, 'calendar']);

    Route::group(['prefix' => 'management'], function(){
        Route::get('users', [ManagementController::class, 'users']);

        Route::group(['prefix' => 'ajax'], function(){
            Route::post('modal-user', [ManagementController::class, 'modalUser']);
            Route::post('store-user', [ManagementController::class, 'storeUser']);
            Route::post('action-user', [ManagementController::class, 'actionUser']);
            Route::post('reset-password', [ManagementController::class, 'resetPassword']);
        });
    });
});

Route::group(['middleware' => ['auth', 'role: 1'], 'prefix' => 'client'], function(){
    Route::get('dashboard', [UserController::class, 'dashboard']);

    Route::group(['prefix' => 'my-will'], function(){
        Route::get('/', [WillController::class, 'myWill']);
        Route::get('{id}', [WillController::class, 'willDetails']);

        Route::group(['prefix' => 'ajax'], function(){
            Route::post('modal-create', [WillController::class, 'modalCreate']);
            Route::post('load-tab', [WillController::class, 'loadTab']);
            Route::post('modal-beneficiary', [WillController::class, 'modalBeneficiary']);
            Route::post('store-beneficiary', [WillController::class, 'storeBeneficiary']);
            Route::post('modal-banking', [WillController::class, 'modalBanking']);
            Route::post('store-banking', [WillController::class, 'storeBanking']);
            Route::post('modal-investment', [WillController::class, 'modalInvestment']);
            Route::post('store-investment', [WillController::class, 'storeInvestment']);
            Route::post('modal-business', [WillController::class, 'modalBusiness']);
            Route::post('store-business', [WillController::class, 'storeBusiness']);
            Route::post('modal-insurance', [WillController::class, 'modalInsurance']);
            Route::post('store-insurance', [WillController::class, 'storeInsurance']);
            Route::post('modal-hire-purchase', [WillController::class, 'modalHirePurchase']);
            Route::post('store-hire-purchase', [WillController::class, 'storeHirePurchase']);
            Route::post('modal-jewelry', [WillController::class, 'modalJewelry']);
            Route::post('store-jewelry', [WillController::class, 'storeJewelry']);
            Route::post('modal-property-other', [WillController::class, 'modalPropertyOther']);
            Route::post('store-property-other', [WillController::class, 'storePropertyOther']);
            Route::post('modal-digital', [WillController::class, 'modalDigital']);
            Route::post('store-digital', [WillController::class, 'storeDigital']);
            Route::post('modal-estate', [WillController::class, 'modalEstate']);
            Route::post('store-estate', [WillController::class, 'storeEstate']);
            Route::post('modal-debt', [WillController::class, 'modalDebt']);
            Route::post('store-debt', [WillController::class, 'storeDebt']);
        });
    });
});

Route::group(['prefix' => 'ajax'], function(){
    Route::post('modal-details', [UserController::class, 'modalDetails']);
    Route::post('store-details', [UserController::class, 'storeDetails']);
    Route::post('modal-password', [ManagementController::class, 'modalPassword']);
    Route::post('store-password', [ManagementController::class, 'storePassword']);
});

Route::group(['prefix' => 'gateway'], function(){
    Route::get('pay', [TransactionController::class, 'gatewayPayment'])->middleware('auth');
});