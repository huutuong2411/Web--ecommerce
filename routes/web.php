<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BlogController;

use App\Http\Controllers\frontend\MemberController;
use App\Http\Controllers\frontend\FE_BlogController;
use App\Http\Controllers\frontend\AccountController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductDetailsController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\MailController;
use App\Http\Controllers\frontend\SearchController;
use App\Http\Controllers\frontend\PriceController;
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

Route::get('/', [HomeController::class,'index']);
Route::get('product/detail/{id}',[ProductDetailsController::class,'show'])->name('productDetails');
Route::group([
	'prefix'=>'/blog',
],function(){
	Route::get('/',[FE_BlogController::class,'getblog'])->name('getblog');
	Route::get('/blogsingle/{id}',[FE_BlogController::class,'blogsingle'])->name('blogsingle');
	Route::post('/blogsingle/{id}',[FE_BlogController::class,'rating'])->name('rating');
	Route::post('/blog/comment/{id}',[FE_BlogController::class,'comment'])->name('comment');
	
});

Route::group([
	'prefix'=>'/cart',
],function(){
	Route::get('/',[CartController::class,'create'])->name('cart');
	Route::post('/',[CartController::class,'updatecart'])->name('updatecart');
	Route::post('/addcart',[CartController::class,'addcart'])->name('addcart');
	Route::get('/get',[CartController::class,'checksession'])->name('checksession');
});
Route::get('/checkout', [CheckoutController::class,'index'])->name('checkout');
Route::get('/sendmail', [MailController::class,'index'])->name('sendmail');

Route::post('/pricesearch', [PriceController::class,'store'])->name('pricesearch');
Route::post('/search', [SearchController::class,'store'])->name('postsearch');


// chưa login thì vào đây
Route::group([
	'middleware'=>'notlogin',
],function(){
		Route::group([
			'prefix'=>'/member',
		],function(){
			Route::get('/login',[MemberController::class,'login'])->name('login');
			Route::post('/login',[MemberController::class,'postlogin'])->name('postlogin');
			
			Route::get('/register',[MemberController::class,'register'])->name('register');
			Route::post('/register',[MemberController::class,'postregister'])->name('postregister');

});
	
});



// Login member rồi thì vào đây
Route::group([
	'middleware'=>'memberlogin',
],function(){
		Route::get('member/logout',[MemberController::class,'logout'])->name('logout');
  		Route::get('/account',[AccountController::class,'account'])->name('account');
    	Route::post('/account',[AccountController::class,'update_profile'])->name('update_profile');

		Route::group([
			'prefix'=>'/product',
		],function(){
			Route::get('/',[ProductController::class,'myproduct'])->name('myproduct');
			Route::get('/add',[ProductController::class,'add'])->name('addproduct');
			Route::post('/add',[ProductController::class,'postadd'])->name('postaddproduct');
			Route::get('/edit/{id}',[ProductController::class,'edit'])->name('editproduct');
			Route::post('/edit/{id}',[ProductController::class,'postedit'])->name('posteditproduct');
			Route::get('/delete/{id}',[ProductController::class,'delete'])->name('deleteproduct');
			
		});	
});
	


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group([
	'prefix'=>'/admin',
	'middleware'=>'admin',
],function(){
	Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

	Route::get('/profile',[UserController::class,'getprofile'])->name('getprofile');
	Route::post('/profile',[UserController::class,'postprofile'])->name('postprofile');

	Route::get('/country',[CountryController::class,'getcountry'])->name('getcountry');

	Route::get('/addcountry',[CountryController::class,'getaddcountry'])->name('getaddcountry');
	Route::post('/addcountry',[CountryController::class,'postaddcountry'])->name('postaddcountry');
	Route::get('/deletecountry/{id}',[CountryController::class,'deletecountry'])->name('deletecountry');

	Route::get('/blog',[BlogController::class,'getblog'])->name('getblog');

	Route::get('/addblog',[BlogController::class,'getaddblog'])->name('getaddblog');
	Route::post('/addblog',[BlogController::class,'postaddblog'])->name('postaddblog');

	Route::get('/editblog/{id}',[BlogController::class,'geteditblog'])->name('geteditblog');
	Route::post('/editblog/{id}',[BlogController::class,'posteditblog'])->name('posteditblog');

	Route::get('/deleteblog/{id}',[BlogController::class,'deleteblog'])->name('deleteblog');
});








 
     
