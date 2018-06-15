<?php
if (version_compare(PHP_VERSION, '7.1.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
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


/*Route::group(['middleware' => 'guest'], function () {
	Route::get('/', 'GuestController@guestIndex');
	Route::get('/list', 'GuestController@fetch');
	Route::get('/guest/partial-post/{id}', 'GuestController@single');
});*/
Route::get('/', 'HomeController@index')->name('welcome');
//Route::get('/search', 'HomeController@guestindex')->name('guest');
Route::get('/search', 'SearchController@index')->name('search');

/* Front page route */
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('/products', 'HomeController@products')->name('products');
Route::post('/cart/addtocart', 'CartController@postaddtocart')->name('postaddtocart');
Route::get('/cart/getcart', 'CartController@getcart')->name('getcart');
Route::post('/cart/deleteitem', 'CartController@deleteitem')->name('deleteitem');


Auth::routes();
/* Admin page route */
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard');

/* Category route*/ 
Route::get('/admin/addcategory', 'CategoriesController@addcategory')->name('addcategory');
Route::get('/admin/editcategory/{id}', 'CategoriesController@editcategory')->name('editcategory');
Route::get('/admin/deletecategory/{id}', 'CategoriesController@deletecategory')->name('deletecategory');
Route::post('/admin/addcategory', 'CategoriesController@postaddcategory')->name('addpostcategory');
Route::get('/admin/viewcategory', 'CategoriesController@viewcategory')->name('viewcategory');

/* Sub Category route*/ 
Route::get('/admin/addsubcategory', 'SubCategoriesController@addsubcategory')->name('addsubcategory');
Route::get('/admin/editsubcategory/{id}', 'SubCategoriesController@editsubcategory')->name('editsubcategory');
Route::get('/admin/deletesubcategory/{id}', 'SubCategoriesController@deletesubcategory')->name('deletesubcategory');
Route::post('/admin/addsubcategory', 'SubCategoriesController@postaddsubcategory')->name('addpostsubcategory');
Route::get('/admin/viewsubcategory', 'SubCategoriesController@viewsubcategory')->name('viewsubcategory');

/* Product Route */
Route::get('/admin/viewproducts', 'ProductsController@viewproducts')->name('viewproducts');
Route::get('/admin/addproduct', 'ProductsController@addproduct')->name('addproduct');
Route::post('/admin/addproduct', 'ProductsController@postaddproduct')->name('addpostproduct');
Route::post('/admin/saveproduct', 'ProductsController@saveproduct')->name('saveproduct');
Route::get('/admin/editproduct/{id}', 'ProductsController@editproduct')->name('editproduct');
Route::get('/admin/deleteproduct/{id}', 'ProductsController@deleteproduct')->name('deleteproduct');


Route::get('/profile', 'AdminController@userprofile')->name('userprofile');
Route::get('/admin/profile', 'AdminController@profile')->name('profile');
Route::post('/admin/profile/update', 'AdminController@postupdateProfile')->name('updateProfile');
Route::post('/admin/profile', 'AdminController@postupdatePassword')->name('updatePassword');
Route::get('/admin/settings', 'SettingsController@index')->name('settings');
Route::post('/admin/settings', 'SettingsController@saveSiteSettings')->name('updateSettings');
Route::post('/admin/upload/profile-photo', 'SettingsController@uploadProfilePhoto')->name('uploadProfilePhoto');
Route::post('/admin/upload/logo', 'SettingsController@uploadLogo')->name('uploadLogo');
Route::post('/admin/upload/footerlogo', 'SettingsController@uploadFooterLogo')->name('uploadFooterLogo');
Route::post('/admin/upload/favicon', 'SettingsController@uploadFavicon')->name('uploadFavicon');
Route::get('/admin/signup', 'AdminController@signup')->name('signup');
// Route::post('/admin/logout', 'AdminController@index')->name('logout');

Route::get('/admin/users', 'AdminController@users')->name('users');

Route::get('/test', 'HomeController@test')->name('test');
Route::get('/test1', 'HomeController@test1')->name('test1');


/* dynamic routes */
Route::get('/category', 'HomeController@guestindex')->name('categories');
Route::get('/category/{slug}', 'HomeController@categories')->name('category');
Route::get('/category/{category}/sub/{slug}', 'HomeController@subCategories')->name('subCategory');
Route::get('/product/{id}', 'HomeController@subpage')->name('subpage');