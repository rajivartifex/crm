<?php

use App\Http\Controllers\BusinessContactInfoController;
use App\Http\Controllers\BusinessIdentityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('customer/manage-index', [CustomerController::class, 'manageIndex'])->name('customer-manage-index');
Route::get('customer', [CustomerController::class, 'addIndex'])->name('customer-add-index');
//Business Identity
Route::get('customer/business-identity', [BusinessIdentityController::class, 'view_business_identity'])->name('customer-business-identity-index');
Route::post('customer/business-identity/store', [BusinessIdentityController::class, 'business_identity_store'])->name('customer-business-identity-store');

//Business Contact Info
Route::get('customer/business-contact-info', [BusinessContactInfoController::class, 'view_business_contact_info'])->name('customer-business-contact-info-index');
Route::post('customer/business-contact-info/store', [BusinessContactInfoController::class, 'business_contact_info_store'])->name('customer-business-contact-info-store');

Route::get('customer/business-location', [CustomerController::class, 'view_business_location'])->name('customer-business-location-index');
Route::get('customer/no-emp', [CustomerController::class, 'view_no_of_emp'])->name('customer-no-emp-index');
Route::get('customer/business-category', [CustomerController::class, 'view_of_business_category'])->name('customer-business-category-index');
Route::get('customer/working-hours', [CustomerController::class, 'view_working_hours'])->name('customer-working-hours-index');
Route::get('customer/description', [CustomerController::class, 'view_description'])->name('customer-description-index');
Route::get('customer/payment-method', [CustomerController::class, 'view_payment_method'])->name('customer-payment-method-index');
Route::get('customer/web', [CustomerController::class, 'view_web'])->name('customer-web-index');
