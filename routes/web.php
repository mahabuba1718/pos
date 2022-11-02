<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('backend.layout.home');
// });
   
// master
Route::get('/',[AdminController::class,'master'])->name('master');

// login_post
Route::get('/login/post',[AdminController::class,'login_post'])->name('login_post');

// logout
Route::get('/logout',[AdminController::class,'logout'])->name('logout');

// registration
Route::get('/registration',[AdminController::class,'registration'])->name('registration');
Route::get('/create/user',[AdminController::class,'register'])->name('register');

// dashboard
Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

// contact=pharmacist
Route::get('/pharmacist',[AdminController::class,'contact_pharmacist'])->name('contact_pharmacist');
Route::get('/editpharma/{id}',[AdminController::class,'editpharma'])->name('editpharma');
Route::get('/supplier',[AdminController::class,'contact_supplier'])->name('contact_supplier');

Route::post('/create/contact',[AdminController::class,'pharma'])->name('pharma');
Route::post('/create/supplier',[AdminController::class,'supplier'])->name('supplier');

// medicine
Route::get('/medicine',[AdminController::class,'medicine'])->name('medicine');
Route::get('/editmedicine/{med_id}',[AdminController::class,'editmedicine'])->name('editmedicine');
Route::post('/create/medicine',[AdminController::class,'admedicine'])->name('admedicine');
Route::put('/update/medicine',[AdminController::class,'updatemedicine'])->name('updatemedicine');
Route::get('/deletemedicine/{med_id}',[AdminController::class,'deletemedicine'])->name('deletemedicine');

// category
Route::get('/category',[AdminController::class,'category'])->name('category');
Route::get('/unit',[AdminController::class,'unit'])->name('unit');
Route::get('/type',[AdminController::class,'type'])->name('type');

Route::post('/create/category',[AdminController::class,'categories'])->name('categories');
Route::post('/create/unit',[AdminController::class,'units'])->name('units');
Route::post('/create/type',[AdminController::class,'types'])->name('types');

// pos
Route::get('/pos',[AdminController::class,'pos'])->name('pos');

// possale
Route::get('/possale',[AdminController::class,'possale'])->name('possale');

// account
Route::get('/expense',[AdminController::class,'account_expense'])->name('account_expense');
Route::get('/income',[AdminController::class,'account_income'])->name('account_income');

Route::post('/create/account',[AdminController::class,'expense'])->name('expense');

// add-purchase
Route::get('/add_purchase',[AdminController::class,'addpurchase'])->name('add_purchase');

// purchase
Route::get('/purchase',[AdminController::class,'purchase'])->name('purchase');
Route::post('/create/purchase',[AdminController::class,'adpurchase'])->name('adpurchase');

// stock
Route::get('/stock_report',[AdminController::class,'stock_report'])->name('stock_report');
Route::get('/expiry_report',[AdminController::class,'expiry_report'])->name('expiry_report');


// invoice
Route::get('/invoice',[AdminController::class,'invoice'])->name('invoice');

// setting
Route::get('/setting',[AdminController::class,'setting'])->name('setting');
Route::post('/create/setting',[AdminController::class,'change'])->name('change');

Route::get('/add_more',[AdminController::class,'add_more'])->name('add_more');




