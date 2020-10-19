<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BrandModelController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConditionController;
use App\Http\Controllers\Admin\DealController;
use App\Http\Controllers\Admin\EngineController;
use App\Http\Controllers\Admin\FuelController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\TransmissionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/',[HomeController::class, 'index'])->name('site');
    Route::get('/catalogue',[HomeController::class,'catalog'])->name('catalogIndex');
    Route::get('/catalogue/{product}',[HomeController::class,'view'])->name('catalogView');
    Route::get('/about-us',[HomeController::class,'about'])->name('aboutIndex');
    Route::get('/contact-us',[HomeController::class,'contact'])->name('contactIndex');
    Route::get('/send-email',[MailController::class,'sendEmail']);
    Route::get('/send-message',[MailController::class,'sendMessage']);
    Route::get('/brand-models',[MailController::class,'models'])->name('brandModels');

});


Route::prefix('admin')->group(function () {
    Auth::routes(['register' => false,'reset' => false,'update' => false,'email' => false]);

    Route::middleware(['auth'])->group(function () {
        Route::get('/logout', [LoginController::class,'logout'])->name('logout');
        Route::namespace('')->group(function () {
            Route::get('/', [SiteController::class,'index'])->name('siteIndex'); // Added name


            // Routes for page
            Route::any('pages',[\App\Http\Controllers\Admin\PageController::class,'index'])->name('pageIndex');
            Route::any('pages/update/{page}',[\App\Http\Controllers\Admin\PageController::class,'update'])->name('pageUpdate');
            Route::get('pages/activate/{id}',[\App\Http\Controllers\Admin\PageController::class,'activate'])->name('activatePage');

            // Routes for Category
            Route::any('categories',[CategoryController::class,'index'])->name('categoryIndex');
            Route::any('categories/update/{category}',[CategoryController::class,'update'])->name('categoryUpdate');
            Route::get('categories/activate/{id}',[CategoryController::class,'activate'])->name('activateCategory');
            Route::match(['get', 'post'],'categories/create',[CategoryController::class,'create'])->name('categoryCreate');

            // Routes for Brand
            Route::any('brands',[BrandController::class,'index'])->name('brandIndex');
            Route::any('brands/update/{brand}',[BrandController::class,'update'])->name('brandUpdate');
            Route::get('brands/activate/{brand}',[BrandController::class,'activate'])->name('brandActivate');
            Route::match(['get', 'post'],'brands/create',[BrandController::class,'create'])->name('brandCreate');

            // Routes for Brand Models
            Route::any('models',[BrandModelController::class,'index'])->name('modelIndex');
            Route::any('models/update/{brandModel}',[BrandModelController::class,'update'])->name('brandModelUpdate');
            Route::get('models/activate/{brandModel}',[BrandModelController::class,'activate'])->name('brandModelActivate');
            Route::match(['get', 'post'],'models/create',[BrandModelController::class,'create'])->name('modelCreate');

            // Routes for Product Fuel
            Route::any('fuels',[FuelController::class,'index'])->name('fuelIndex');
            Route::any('fuels/update/{fuel}',[FuelController::class,'update'])->name('fuelUpdate');
            Route::get('fuels/activate/{fuel}',[FuelController::class,'activate'])->name('fuelActivate');
            Route::match(['get', 'post'],'fuels/create',[FuelController::class,'create'])->name('fuelCreate');

            // Routes for Product Condition
            Route::any('conditions',[ConditionController::class,'index'])->name('conditionIndex');
            Route::any('conditions/update/{condition}',[ConditionController::class,'update'])->name('conditionUpdate');
            Route::get('conditions/activate/{condition}',[ConditionController::class,'activate'])->name('conditionActivate');
            Route::match(['get', 'post'],'conditions/create',[ConditionController::class,'create'])->name('conditionCreate');

            // Routes for Product Transmission
            Route::any('transmissions',[TransmissionsController::class,'index'])->name('transmissionIndex');
            Route::any('transmissions/update/{transmission}',[TransmissionsController::class,'update'])->name('transmissionUpdate');
            Route::get('transmissions/activate/{transmission}',[TransmissionsController::class,'activate'])->name('transmissionActivate');
            Route::match(['get', 'post'],'transmissions/create',[TransmissionsController::class,'create'])->name('transmissionCreate');

            // Routes for Product Transmission
            Route::any('engines',[EngineController::class,'index'])->name('engineIndex');
            Route::any('engines/update/{engine}',[EngineController::class,'update'])->name('engineUpdate');
            Route::get('engines/activate/{engine}',[EngineController::class,'activate'])->name('engineActivate');
            Route::match(['get', 'post'],'engines/create',[EngineController::class,'create'])->name('engineCreate');

            // Routes for Product Deal
            Route::any('deals',[DealController::class,'index'])->name('dealIndex');
            Route::any('deals/update/{deal}',[DealController::class,'update'])->name('dealUpdate');
            Route::get('deals/activate/{deal}',[DealController::class,'activate'])->name('dealActivate');
            Route::match(['get', 'post'],'deals/create',[DealController::class,'create'])->name('dealCreate');



            // Setting Controller
            Route::any('settings',[SettingsController::class,'index'])->name('settingsIndex');
            Route::post('settings/contact',[SettingsController::class,'contact'])->name('contactUpdate');
            Route::post('settings/social',[SettingsController::class,'social'])->name('socialUpdate');
            Route::post('settings/smtp',[SettingsController::class,'smtp'])->name('settingSmtp');


            // Products routes
            Route::any('products',[ProductController::class,'index'])->name('productIndex');
            Route::any('products/update/{product}',[ProductController::class,'update'])->name('productUpdate');
            Route::get('products/activate/{product}',[ProductController::class,'activate'])->name('productActivate');
            Route::get('products/vip/{product}',[ProductController::class,'vip'])->name('productVip');
            Route::match(['get', 'post'],'products/create',[ProductController::class,'create'])->name('productCreate');
            Route::get('products/models',[ProductController::class,'models'])->name('getModels');


            Route::get('images/delete',[ImageController::class,'delete'])->name('imageDelete');
            Route::get('images/brand-image-delete',[ImageController::class,'brandImageDelete'])->name('brandImageDelete');


        });
    });
});
