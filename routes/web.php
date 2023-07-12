<?php

use App\Http\Controllers\BusinessAboutEmpController;
use App\Http\Controllers\BusinessCategoriesController;
use App\Http\Controllers\BusinessCommentController;
use App\Http\Controllers\BusinessContactInfoController;
use App\Http\Controllers\BusinessCustDescController;
use App\Http\Controllers\BusinessDomainController;
use App\Http\Controllers\BusinessIdentityController;
use App\Http\Controllers\BusinessLocationController;
use App\Http\Controllers\BusinessLogController;
use App\Http\Controllers\BusinessMarketingController;
use App\Http\Controllers\BusinessPaymentController;
use App\Http\Controllers\BusinessSubscriptionController;
use App\Http\Controllers\BusinessSupportController;
use App\Http\Controllers\BusinessWebController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('register', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::group(['middleware' => ['auth']], function() {
    //Dashboard
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');

    //Roles
    Route::resource('settings/roles', RoleController::class);
    Route::post('settings/roles/delete', [RoleController::class,'roles_delete'])->name('roles-delete');

    //Users
    Route::resource('settings/users', UserController::class);
    Route::post('settings/users/delete', [UserController::class,'users_delete'])->name('users-delete');

    //Customers
    Route::get('customer/manage-index', [CustomerController::class, 'manageIndex'])->name('customer-manage-index');
    Route::get('customer', [CustomerController::class, 'addIndex'])->name('customer-add-index');
    Route::post('customer/delete', [CustomerController::class, 'customer_delete'])->name('customer-delete');

    //Business Identity
    Route::get('customer/business-identity', [BusinessIdentityController::class, 'view_business_identity'])->name('customer-business-identity-index');
    Route::post('customer/business-identity/store', [BusinessIdentityController::class, 'business_identity_store'])->name('customer-business-identity-store');

    //Business Contact Info
    Route::get('customer/business-contact-info', [BusinessContactInfoController::class, 'view_business_contact_info'])->name('customer-business-contact-info-index');
    Route::post('customer/business-contact-info/store', [BusinessContactInfoController::class, 'business_contact_info_store'])->name('customer-business-contact-info-store');
    Route::post('customer/business-contact-info/delete', [BusinessContactInfoController::class, 'business_contact_info_delete'])->name('customer-business-contact-info-delete');

    //Business About Employees
    Route::get('customer/no-emp', [BusinessAboutEmpController::class, 'view_no_of_emp'])->name('customer-no-emp-index');
    Route::post('customer/no-emp/store', [BusinessAboutEmpController::class, 'view_no_of_emp_store'])->name('customer-no-emp-store');
    Route::post('customer/no-emp/delete', [BusinessAboutEmpController::class, 'view_no_of_emp_delete'])->name('customer-no-emp-delete');

    //Business About Description
    Route::get('customer/description', [BusinessCustDescController::class, 'view_description'])->name('customer-description-index');
    Route::post('customer/description/store', [BusinessCustDescController::class, 'view_description_store'])->name('customer-description-store');
    Route::post('customer/description/delete', [BusinessCustDescController::class, 'view_description_delete'])->name('customer-description-delete');

    //Business Categories
    Route::get('customer/business-category', [BusinessCategoriesController::class, 'view_of_business_category'])->name('customer-business-category-index');
    Route::post('customer/business-category/store', [BusinessCategoriesController::class, 'view_of_business_category_store'])->name('customer-business-category-store');
    Route::post('customer/business-category/delete', [BusinessCategoriesController::class, 'view_of_business_category_delete'])->name('customer-business-category-delete');

    //Business Payment
    Route::get('customer/payment-method', [BusinessPaymentController::class, 'view_payment_method'])->name('customer-payment-method-index');
    Route::post('customer/payment-method/store', [BusinessPaymentController::class, 'view_payment_method_store'])->name('customer-payment-method-store');
    Route::post('customer/payment-method/delete', [BusinessPaymentController::class, 'view_payment_method_delete'])->name('customer-payment-method-delete');

    //Social Media
    Route::get('customer/web', [BusinessWebController::class, 'view_web'])->name('customer-web-index');
    Route::post('customer/web/store', [BusinessWebController::class, 'view_web_store'])->name('customer-web-store');
    Route::post('customer/web/delete', [BusinessWebController::class, 'view_web_delete'])->name('customer-web-delete');

    //Business Comment
    Route::get('customer/comment', [BusinessCommentController::class, 'view_comment'])->name('customer-comment-index');
    Route::post('customer/comment/store', [BusinessCommentController::class, 'view_comment_store'])->name('customer-comment-store');
    Route::post('customer/comment/delete', [BusinessCommentController::class, 'view_comment_delete'])->name('customer-comment-delete');

    //Business Domain
    Route::get('customer/domain', [BusinessDomainController::class, 'view_domain'])->name('customer-domain-index');
    Route::post('customer/domain/store', [BusinessDomainController::class, 'view_domain_store'])->name('customer-domain-store');
    Route::post('customer/domain/delete', [BusinessDomainController::class, 'view_domain_delete'])->name('customer-domain-delete');

    //Business Subscription
    Route::get('customer/subscription', [BusinessSubscriptionController::class, 'view_subscription'])->name('customer-subscription-index');
    Route::post('customer/subscription/store', [BusinessSubscriptionController::class, 'view_subscription_store'])->name('customer-subscription-store');
    Route::post('customer/subscription/delete', [BusinessSubscriptionController::class, 'view_subscription_delete'])->name('customer-subscription-delete');

    //Business Marketing
    Route::get('customer/marketing', [BusinessMarketingController::class, 'view_marketing'])->name('customer-marketing-index');
    Route::post('customer/marketing/store', [BusinessMarketingController::class, 'view_marketing_store'])->name('customer-marketing-store');
    Route::post('customer/marketing/delete', [BusinessMarketingController::class, 'view_marketing_delete'])->name('customer-marketing-delete');

    //Business Support
    Route::get('customer/support', [BusinessSupportController::class, 'view_support'])->name('customer-support-index');
    Route::post('customer/support/store', [BusinessSupportController::class, 'view_support_store'])->name('customer-support-store');
    Route::post('customer/support/delete', [BusinessSupportController::class, 'view_support_delete'])->name('customer-support-delete');

    //Business Log
    Route::post('customer/log/store', [BusinessLogController::class, 'view_log_store'])->name('customer-log-store');

    //Business Location
    Route::get('customer/business-location', [BusinessLocationController::class, 'view_business_location'])->name('customer-business-location-index');
    Route::post('customer/business-location/store', [BusinessLocationController::class, 'view_business_location_store'])->name('customer-business-location-store');
    Route::post('customer/business-location/delete', [BusinessLocationController::class, 'view_business_location_delete'])->name('customer-business-location-delete');

    //Working Hours
    Route::get('customer/working-hours', [CustomerController::class, 'view_working_hours'])->name('customer-working-hours-index');

});


