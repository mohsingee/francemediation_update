<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ModuleSettingController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
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

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);
Route::get('a-propos-de', [App\Http\Controllers\FrontendController::class, 'about_us']);
Route::get('formation', [App\Http\Controllers\FrontendController::class, 'formation'])->name("formation");
Route::get('nouvelles', [App\Http\Controllers\FrontendController::class, 'nouvelles']);
Route::get('mediation', [App\Http\Controllers\FrontendController::class, 'mediation']);
Route::get('blogue', [App\Http\Controllers\FrontendController::class, 'blogue']);
Route::get('contact', [App\Http\Controllers\FrontendController::class, 'contact']);
Route::get('mediater', [App\Http\Controllers\FrontendController::class, 'mediater'])->name('page.mediator');
Route::post('submit-formation-form', [App\Http\Controllers\FrontendController::class, 'formation_submission'])->name('submit.formation');
Route::post('submit-mediator-form', [App\Http\Controllers\FrontendController::class, 'mediator_submission'])->name('submit.mediator');
//Route::redirect('/', 'login');

////////////////************ Paypal Routes ************////////////////
Route::get('paywithpaypal', [FrontendController::class, 'payWithPaypal']);
Route::get('paypal_pay/{id}',[PaypalController::class,'paymentWithpaypal'])->name('paypal.pay');
Route::get('paypal',[PaypalController::class,'getPaymentStatus'])->name('status');
////////////////************ End Paypal Routes ************////////////////

Route::get('/admin5-login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Auth::routes();

Route::get('/{slug}', [App\Http\Controllers\CmsController::class, 'preview'])->name('cms.preview');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('admin.profile');
    Route::post('/profile/store', [App\Http\Controllers\HomeController::class, 'storeProfile'])->name('admin.storeProfile');
    Route::get('/change_password', [App\Http\Controllers\HomeController::class, 'change_password'])->name('admin.change_password');

    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('/user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
    Route::delete('/user/deleteAllUser', [App\Http\Controllers\UserController::class, 'deleteAllUser'])->name('user.delete-all');
    Route::get('/user/status/{id}/{status}', [App\Http\Controllers\UserController::class, 'status'])->name('user.status');

    Route::get('/formation', [App\Http\Controllers\FormationController::class, 'index'])->name('formation.index');
    Route::get('/formation/edit/{id}', [App\Http\Controllers\FormationController::class, 'edit'])->name('formation.edit');
    Route::get('/formation/show/{id}', [App\Http\Controllers\FormationController::class, 'show'])->name('formation.show');
    Route::put('/formation/update/{id}', [App\Http\Controllers\FormationController::class, 'update'])->name('formation.update');
    Route::get('/formation/destroy/{id}', [App\Http\Controllers\FormationController::class, 'destroy'])->name('formation.destroy');
    Route::delete('/formation/deleteAll', [App\Http\Controllers\FormationController::class, 'deleteAll'])->name('formation.delete-all');
    Route::get('/formation/status/{id}/{status}', [App\Http\Controllers\FormationController::class, 'status'])->name('formation.status');

    Route::get('/mediator', [App\Http\Controllers\MediatorController::class, 'index'])->name('mediator.index');
    Route::get('/mediator/edit/{id}', [App\Http\Controllers\MediatorController::class, 'edit'])->name('mediator.edit');
    Route::get('/mediator/show/{id}', [App\Http\Controllers\MediatorController::class, 'show'])->name('mediator.show');
    Route::put('/mediator/update/{id}', [App\Http\Controllers\MediatorController::class, 'update'])->name('mediator.update');
    Route::get('/mediator/destroy/{id}', [App\Http\Controllers\MediatorController::class, 'destroy'])->name('mediator.destroy');
    Route::delete('/mediator/deleteAll', [App\Http\Controllers\MediatorController::class, 'deleteAll'])->name('mediator.delete-all');
    Route::get('/mediator/status/{id}/{status}', [App\Http\Controllers\MediatorController::class, 'status'])->name('mediator.status');

    Route::get('/cms', [App\Http\Controllers\CmsController::class, 'index'])->name('cms.index');
    Route::get('/cms/create', [App\Http\Controllers\CmsController::class, 'create'])->name('cms.create');
    Route::post('/cms/store', [App\Http\Controllers\CmsController::class, 'store'])->name('cms.store');
    Route::get('/cms/edit/{id}', [App\Http\Controllers\CmsController::class, 'edit'])->name('cms.edit');
    Route::post('/cms/update/{id}', [App\Http\Controllers\CmsController::class, 'update'])->name('cms.update');
    Route::get('/cms/destroy/{id}', [App\Http\Controllers\CmsController::class, 'destroy'])->name('cms.destroy');
    Route::delete('/cms/deleteAll', [App\Http\Controllers\CmsController::class, 'deleteAll'])->name('cms.delete-all');

    Route::get('/modulesetting', [App\Http\Controllers\ModuleSettingController::class, 'index'])->name('modulesetting.index');
    Route::get('/modulesetting/create', [App\Http\Controllers\ModuleSettingController::class, 'create'])->name('modulesetting.create');
    Route::post('/modulesetting/store', [App\Http\Controllers\ModuleSettingController::class, 'store'])->name('modulesetting.store');
    Route::get('/modulesetting/edit/{id}', [App\Http\Controllers\ModuleSettingController::class, 'edit'])->name('modulesetting.edit');
    Route::post('/modulesetting/update/{id}', [App\Http\Controllers\ModuleSettingController::class, 'update'])->name('modulesetting.update');
    Route::delete('/modulesetting/destroy', [App\Http\Controllers\ModuleSettingController::class, 'destroy'])->name('modulesetting.destroy');
    Route::get('/modulesetting/editattribute/{id}', [App\Http\Controllers\ModuleSettingController::class, 'editattribute'])->name('modulesetting.editattribute');

    Route::get('/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('setting.index');
    Route::get('/settings/create', [App\Http\Controllers\SettingController::class, 'create'])->name('setting.create');
    Route::post('/settings/store', [App\Http\Controllers\SettingController::class, 'store'])->name('setting.store');
    Route::get('/settings/edit/{id}', [App\Http\Controllers\SettingController::class, 'edit'])->name('setting.edit');
    Route::post('/settings/update/{id}', [App\Http\Controllers\SettingController::class, 'update'])->name('setting.update');
    Route::get('/settings/destroy/{id}', [App\Http\Controllers\SettingController::class, 'destroy'])->name('setting.destroy');

    Route::resource('blogs', BlogsController::class);
    Route::get('blogs/delete/{id}', [BlogsController::class, 'delete'])->name('blogs.delete');
    Route::post('/blogs/deleteAll', [BlogsController::class, 'deleteAll'])->name('blogs.delete-all');

    Route::resource('courses', CoursesController::class);
    Route::get('courses/delete/{id}', [CoursesController::class, 'delete'])->name('courses.delete');
    Route::post('/courses/deleteAll', [CoursesController::class, 'deleteAll'])->name('courses.delete-all');

    Route::resource('instructor', InstructorController::class);
    Route::get('instructor/delete/{id}', [InstructorController::class, 'delete'])->name('instructor.delete');
    Route::post('/instructor/deleteAll', [InstructorController::class, 'deleteAll'])->name('instructor.delete-all');
    
    Route::resource('events', EventController::class);
    Route::get('events/delete/{id}', [EventController::class, 'delete'])->name('events.delete');
    Route::post('/events/deleteAll', [EventController::class, 'deleteAll'])->name('events.delete-all');
    
    Route::resource('categories', CategoryController::class);
    Route::get('categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::post('/categories/deleteAll', [CategoryController::class, 'deleteAll'])->name('categories.delete-all');
    
    Route::resource('sub_categories', SubCategoryController::class);
    Route::get('sub_categories/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub_categories.delete');
    Route::post('/sub_categories/deleteAll', [SubCategoryController::class, 'deleteAll'])->name('sub_categories.delete-all');
});

Route::get('auth/google', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback']);
Route::get('/modulesetting/getattribute/{user}', [App\Http\Controllers\ModuleSettingController::class, 'getattribute'])->name('modulesetting.getattribute');
// Route::get('/admin/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('admin.profile');
// Route::get('/admin/change_password', [App\Http\Controllers\HomeController::class, 'change_password'])->name('admin.change_password');

// Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
// Route::get('/admin/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
// Route::post('/admin/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
// Route::get('/admin/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
// Route::post('/admin/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
// Route::get('/admin/user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
// Route::delete('/admin/user/deleteAllUser', [App\Http\Controllers\UserController::class, 'deleteAllUser'])->name('user.delete-all');
// Route::get('/admin/user/status/{id}/{status}', [App\Http\Controllers\UserController::class, 'status'])->name('user.status');

// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Route::get('/admin/cms', [App\Http\Controllers\CmsController::class, 'index'])->name('cms.index');
// Route::get('/admin/cms/create', [App\Http\Controllers\CmsController::class, 'create'])->name('cms.create');
// Route::post('/admin/cms/store', [App\Http\Controllers\CmsController::class, 'store'])->name('cms.store');
// Route::get('/admin/cms/edit/{id}', [App\Http\Controllers\CmsController::class, 'edit'])->name('cms.edit');
// Route::post('/admin/cms/update/{id}', [App\Http\Controllers\CmsController::class, 'update'])->name('cms.update');
// Route::get('/admin/cms/destroy/{id}', [App\Http\Controllers\CmsController::class, 'destroy'])->name('cms.destroy');
// Route::delete('/admin/cms/deleteAll', [App\Http\Controllers\CmsController::class, 'deleteAll'])->name('cms.delete-all');
// Route::get('/admin/cms/{slug}', [App\Http\Controllers\CmsController::class, 'preview'])->name('cms.preview');

// Route::get('/modulesetting', [App\Http\Controllers\ModuleSettingController::class, 'index'])->name('modulesetting.index');
// Route::get('/modulesetting/create', [App\Http\Controllers\ModuleSettingController::class, 'create'])->name('modulesetting.create');
// Route::post('/modulesetting/store', [App\Http\Controllers\ModuleSettingController::class, 'store'])->name('modulesetting.store');
// Route::get('/modulesetting/edit', [App\Http\Controllers\ModuleSettingController::class, 'edit'])->name('modulesetting.edit');
// Route::post('/modulesetting/update/{id}', [App\Http\Controllers\ModuleSettingController::class, 'update'])->name('modulesetting.update');
// Route::get('/modulesetting/destroy/{id}', [App\Http\Controllers\ModuleSettingController::class, 'destroy'])->name('modulesetting.destroy');

// Route::get('/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('setting.index');
// Route::get('/settings/create', [App\Http\Controllers\SettingController::class, 'create'])->name('setting.create');
// Route::post('/settings/store', [App\Http\Controllers\SettingController::class, 'store'])->name('setting.store');
// Route::get('/settings/edit/{id}', [App\Http\Controllers\SettingController::class, 'edit'])->name('setting.edit');
// Route::post('/settings/update/{id}', [App\Http\Controllers\SettingController::class, 'update'])->name('setting.update');
// Route::get('/settings/destroy/{id}', [App\Http\Controllers\SettingController::class, 'destroy'])->name('setting.destroy');

// Route::get('auth/google', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.login');
// Route::get('auth/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback']);




// Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
// Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
// Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));