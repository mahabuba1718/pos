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
Route::post('/login/post',[AdminController::class,'login_post'])->name('login_post');

// logout
Route::get('/logout',[AdminController::class,'logout'])->name('logout');

// registration
Route::get('/registration',[AdminController::class,'registration'])->name('registration');
Route::get('/create/user',[AdminController::class,'register'])->name('register');

// dashboard
Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

// search
// Route::get('/search',[AdminController::class,'searchmed'])->name('searchmed');

// contact=pharmacist
Route::get('/pharmacist',[AdminController::class,'contact_pharmacist'])->name('contact_pharmacist');
Route::post('/create/contact',[AdminController::class,'pharma'])->name('pharma');
Route::get('/editpharma/{pharm_id}',[AdminController::class,'editpharma'])->name('editpharma');
Route::put('/update/pharmacist',[AdminController::class,'updatepharm'])->name('updatepharm');
Route::delete('/deletepharma',[AdminController::class,'deletepharma'])->name('deletepharma');
// Route::get('/deltpharm/{pharm_id}',[AdminController::class,'deltpharm'])->name('deltpharm');
Route::get('/status/{id}',[AdminController::class,'status'])->name('status');

// contact=customer
Route::get('/customer',[AdminController::class,'contact_customer'])->name('contact_customer');
Route::post('/create/cutomer',[AdminController::class,'cus'])->name('cus');
Route::get('/editcus/{cus_id}',[AdminController::class,'editcus'])->name('editcus');
Route::put('/update/customer',[AdminController::class,'updatecus'])->name('updatecus');
Route::delete('/deletecus',[AdminController::class,'deletecus'])->name('deletecus');
Route::get('/cus_status/{cus_id}',[AdminController::class,'cus_status'])->name('cus_status');

// supplier
Route::get('/supplier',[AdminController::class,'contact_supplier'])->name('contact_supplier');
Route::post('/create/supplier',[AdminController::class,'supplier'])->name('supplier');
Route::get('/editsup/{sup_id}',[AdminController::class,'editsup'])->name('editsup');
Route::put('/update/supplier',[AdminController::class,'updatesup'])->name('updatesup');
Route::get('/deletesup/{sup_id}',[AdminController::class,'deletesup'])->name('deletesup');
Route::get('/deltsupe/{sup_id}',[AdminController::class,'deltsupe'])->name('deltsupe');
Route::get('/sup_status/{id}',[AdminController::class,'sup_status'])->name('sup_status');

// medicine
Route::get('/medicine',[AdminController::class,'medicine'])->name('medicine');
Route::post('/create/medicine',[AdminController::class,'admedicine'])->name('admedicine');
Route::get('/editmedicine/{med_id}',[AdminController::class,'editmedicine'])->name('editmedicine');
Route::get('/viewmed/{med_id}',[AdminController::class,'viewmed'])->name('viewmed');
Route::put('/update/medicine',[AdminController::class,'updatemedicine'])->name('updatemedicine');
Route::get('/deletemedicine/{med_id}',[AdminController::class,'deletemedicine'])->name('deletemedicine');
Route::get('/deletemed/{med_id}',[AdminController::class,'deletemed'])->name('deletemed');
Route::get('/med_status/{id}',[AdminController::class,'med_status'])->name('med_status');

// category
Route::get('/category',[AdminController::class,'category'])->name('category');
Route::post('/create/category',[AdminController::class,'categories'])->name('categories');
Route::get('/editcat/{cat_id}',[AdminController::class,'editcat'])->name('editcat');
Route::put('/update/category',[AdminController::class,'updatecat'])->name('updatecat');
Route::post('/deletecat',[AdminController::class,'deletecat'])->name('deletecat');
Route::get('/cat_status/{id}',[AdminController::class,'cat_status'])->name('cat_status');

// UNIT
Route::get('/unit',[AdminController::class,'unit'])->name('unit');
Route::post('/create/unit',[AdminController::class,'units'])->name('units');
Route::get('/editunit/{unit_id}',[AdminController::class,'editunit'])->name('editunit');
Route::put('/update/unit',[AdminController::class,'updateunit'])->name('updateunit');
Route::post('/deleteunit',[AdminController::class,'deleteunit'])->name('deleteunit');
Route::get('/unit_status/{id}',[AdminController::class,'unit_status'])->name('unit_status');

// type
Route::get('/type',[AdminController::class,'type'])->name('type');
Route::post('/create/type',[AdminController::class,'types'])->name('types');
Route::get('/edittype/{type_id}',[AdminController::class,'edittype'])->name('edittype');
Route::put('/update/type',[AdminController::class,'updatetype'])->name('updatetype');
Route::post('/deletetype',[AdminController::class,'deletetype'])->name('deletetype');
Route::get('/type_status/{id}',[AdminController::class,'type_status'])->name('type_status');

// pos
Route::get('/pos',[AdminController::class,'pos'])->name('pos');
Route::get('/pos-add/{id}',[AdminController::class,'addtocart'])->name('addtocart');
Route::get('/pos-delete/{id}',[AdminController::class,'deletecart'])->name('deletecart');

Route::post('/cart_increment',[AdminController::class,'cart_increment'])->name('cart_increment');

Route::get('/pos-search', [AdminController::class,'searchmedicine'])->name('searchmedicine');

// possale
Route::get('/possale',[AdminController::class,'possale'])->name('possale');
Route::post('/create/possale',[AdminController::class,'pos_sale'])->name('pos_sale');

// account
Route::get('/expense',[AdminController::class,'account_expense'])->name('account_expense');
Route::get('/income',[AdminController::class,'account_income'])->name('account_income');

Route::post('/create/account',[AdminController::class,'expense'])->name('expense');

// add-purchase
Route::get('/add_purchase',[AdminController::class,'addpurchase'])->name('add_purchase');

// purchase
Route::get('/purchase',[AdminController::class,'purchase'])->name('purchase');
Route::get('/viewpurch/{purch_id}',[AdminController::class,'viewpurch'])->name('viewpurch');
Route::get('/purchase/find_med/{id}',[AdminController::class,'purchase_find_med'])->name('purchase_find_med');
Route::post('/create/purchase',[AdminController::class,'adpurchase'])->name('adpurchase');
Route::post('/deletepurch',[AdminController::class,'deletepurch'])->name('deletepurch');
Route::get('/purchase-approve/{id}', [AdminController::class,'approve'])->name('purchase_approve');

// stock
Route::get('/stock_report',[AdminController::class,'stock_report'])->name('stock_report');
Route::get('/expiry_report',[AdminController::class,'expiry_report'])->name('expiry_report');


// invoice
Route::get('/invoice',[AdminController::class,'invoice'])->name('invoice');

// setting
Route::get('/setting',[AdminController::class,'setting'])->name('setting');
Route::post('/create/setting',[AdminController::class,'change'])->name('change');

Route::get('/add_more',[AdminController::class,'add_more'])->name('add_more');




