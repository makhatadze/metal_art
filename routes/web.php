<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BrandModelController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DealController;
use App\Http\Controllers\Admin\FuelController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\SizeController;
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
    Route::get('/statement',[HomeController::class,'statement'])->name('statementIndex');
    // Mail
    Route::post('/send-email',[MailController::class,'sendEmail']);
    Route::post('/send-message',[MailController::class,'sendMessage']);
    Route::get('/brand-models',[MailController::class,'models'])->name('brandModels');
    Route::post('/send-loan',[MailController::class,'sendLoan'])->name('sendLoan');
    Route::post('/send-statement',[MailController::class,'sendStatement'])->name('sendStatement');

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
            Route::match(['get', 'post'],'categories/create-sub-category',[CategoryController::class,'createSub'])->name('subCategoryCreate');

            // Routes for Product Size
            Route::any('sizes',[SizeController::class,'index'])->name('sizeIndex');
            Route::any('sizes/update/{size}',[SizeController::class,'update'])->name('sizeUpdate');
//            Route::get('sizes/activate/{id}',[CategoryController::class,'activate'])->name('activateCategory');
            Route::match(['get', 'post'],'sizes/create',[SizeController::class,'create'])->name('sizeCreate');



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
            Route::get('products/delete/{product}',[ProductController::class,'delete'])->name('productDelete');
            Route::get('products/models',[ProductController::class,'models'])->name('getModels');


            Route::get('images/delete',[ImageController::class,'delete'])->name('imageDelete');
            Route::get('images/brand-image-delete',[ImageController::class,'brandImageDelete'])->name('brandImageDelete');


        });
    });
});
