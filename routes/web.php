<?php

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

Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');
Route::resource('test', 'TestController');
Route::get('/testa/carbon', function() {
    $value = \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', '13/12/2031 23:11:23');
    return $value;
    dd($value);
});

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/admin/danhsachvaitro','VaitroController');
Route::resource('/admin/danhsachchude','ChudeController');
Route::resource('/admin/danhsachlinhvuc','LinhvucController');
Route::resource('/admin/danhsachnhanvien','NhanvienController');
Route::resource('/admin/danhsachslide','SLideController');
Route::resource('/admin/danhsachbaiviet','BaivietController');


/*
Route::get('/main', 'HomeController@index');
Route::post('/main/checklogin', 'HomeController@checklogin');
Route::get('main/successlogin', 'HomeController@successlogin');
Route::get('main/logout', 'HomeController@logout');

Route::get('admincp/login', 'Admin\AdminLoginController@getLogin');
Route::post('admincp/login','Admin\AdminLoginController@postLogin');
Route::get('admincp/logout', 'Admin\AdminLoginController@getLogout');
*/

Route::get('admincp/login', ['as' => 'getLogin', 'uses' => 'Admin\AdminLoginController@getLogin']);
Route::post('admincp/login', ['as' => 'postLogin', 'uses' => 'Admin\AdminLoginController@postLogin']);
Route::get('admincp/logout', ['as' => 'getLogout', 'uses' => 'Admin\AdminLoginController@getLogout']);

Route::group(['middleware' => 'checkAdminLogin', 'prefix' => 'admincp', 'namespace' => 'Admin'], function() {
	Route::get('/', function() {
		return view('admin.home');
	});
});
/*route::get('/', 'UserController@getLogin');
route::post('/', 'UserController@postLogin')->name('postLogin');
//$router->group(['middleware' => ['auth'], 'prefix' => 'admin'], function($router)
//{
    // route Loai
    //$router->get('/danhsachvaitro', 'VaitroController@index')->name('danhsachvaitro.index');
    //$router->get('/danhsachvaitro/{id}', 'VaitroController@edit')->name('danhsachvaitro.edit');
    //$router->put('/danhsachvaitro/{id}', 'VaitroController@update')->name('danhsachvaitro.update');
    //$router->delete('/danhsachvaitro/{id}', 'VaitriController@destroy')->name('danhsachvaitro.destroy');
//});
/*
Route::post('nhanvien/login',['uses'=>'NhanvienController@login']);
Route::post('nhanvien/logout',['uses'=>'NhanvienController@logout']);
Route::get('qt', function(){ return view('backend.layouts.index');});
/*
Route::get('/admin', function(){
    return view('backend.layouts.index');
});
Route::get('/dang-nhap', 'UserController@getdangnhapAdmin');
Route::post('/dang-nhap', 'UserController@postdangnhapAdmin');*/

//Route::get('/admin/danhsachloai','LoaiController@index')->name('danhsachloai.index');
//Route::get('/dang-nhap', 'BackendController@index')->name('frontend.home');
//Route::get('/', 'FrontendController@index')->name('frontend.home');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::get('/home', 'UserController@index')->name('home');
