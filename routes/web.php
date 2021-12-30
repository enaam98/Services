<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceCategoriesController;
use App\Http\Controllers\admin\adminservicecategorycontroller;
use App\Http\Controllers\admin\allservicecategorycontroller;
use App\Http\Controllers\admin\AdminServicesByCategoryController;
use App\Http\Controllers\admin\AdminAddServicesController;
use App\Http\Controllers\admin\ContactsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ServicByeCategoriesController;
use App\Http\Controllers\ServiceDetailController;
use App\Http\Controllers\ContactController;



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
    return view('welcome');
});

Route::get('home',[HomeController::class, 'index'])->name('home');
Route::get('/autocomplete',[HomeController::class, 'autocomplete'])->name('autocomplete');
Route::post('/searchService',[HomeController::class, 'searchService'])->name('searchService');

//contact
Route::get('/contact',[ContactController::class, 'contact'])->name('Home.contact');
Route::get('/contacts',[ContactsController::class, 'index'])->name('admin.contacts');
Route::post('/store',[ContactController::class, 'store'])->name('store');



Route::get('/ServiceCategories',[ServiceCategoriesController::class, 'index'])->name('Home.ServiceCategories');
Route::get('/{category_slug}/services',[ServicByeCategoriesController::class, 'index'])->name('Home.ServiceByCategories');
Route::get('/service/{service_slug}',[ServiceDetailController::class, 'index'])->name('Home.ServiceDetail');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//////Socialite
Route::get('/sign-in/github',[LoginController::class,'github']);
Route::get('/sign-in/github/redirect',[LoginController::class,'githubRedirect']);

Route::get('/sign-in/facebook',[LoginController::class,'facebook'])->name('login');
Route::get('/sign-in/facebook/redirect',[LoginController::class,'facebookRedirect'])->name('redirect');



Route::get('/admin/service-category',[adminservicecategorycontroller::class, 'index'])->name('admin.ServiceCategories');
Route::get('/admin/service-category/add',[adminservicecategorycontroller::class, 'create'])->name('admin.add_Service_Categories');
Route::post('/admin/service-category/store',[adminservicecategorycontroller::class, 'store'])->name('admin.store_Service_Categories');
Route::get('/admin/service-category/edit/{id}', [adminservicecategorycontroller::class, 'edit'])->name('admin.edit_Service_Categories');
Route::post('/admin/service-category/update/{id}', [adminservicecategorycontroller::class, 'update'])->name('admin.update_Service_Categories');
Route::delete('/admin/service-category/delete/{id}',[adminservicecategorycontroller::class, 'destroy'])->name('admin.delete_Service_Categories');
Route::get('/admin/{category_slug}/services',[AdminServicesByCategoryController::class, 'index'])->name('admin.Service_By_Categories');


Route::get('/admin/services/add',[AdminAddServicesController::class, 'index'])->name('admin.add_Service');
Route::post('/admin/service/store',[AdminAddServicesController::class, 'store'])->name('admin.store_Service');
Route::get('/admin/service/edit/{id}',[AdminAddServicesController::class, 'edit'])->name('admin.edit_Service');
Route::post('/admin/service/update/{id}', [AdminAddServicesController::class, 'update'])->name('admin.update_Service');
Route::delete('/admin/service/delete/{id}',[AdminAddServicesController::class, 'destroy'])->name('admin.delete_Service');

//////All Services
Route::get('/admin/all-services',[allservicecategorycontroller::class, 'index'])->name('admin.all_Service_Categories');

