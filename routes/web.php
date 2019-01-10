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
//$router->group(['middleware' => ['auth']], function($router)
//{
   // Route::group(['prefix'=>'admin','middleware'=>'checkAdminLogin'], function(){
        Route::resource('/danhsachvaitro','VaitroController');
        Route::resource('/danhsachchude','ChudeController');
        Route::resource('/danhsachlinhvuc','LinhvucController');
        Route::resource('/danhsachnhanvien','NhanvienController');
        Route::resource('/danhsachslide','SLideController');
        Route::resource('/danhsachbaiviet','BaivietController');
        Route::get('/ajax/chude/{lv_ma}','AjaxController@getChuDe');
   
   // });
    // Route::group(['prefix'=>'ajax'],function(){
    //     Route::get('ajax/chude/{lv_ma}','AjaxController@getChuDe');
    // });
//});
    // Route::resource('/admin/danhsachvaitro','VaitroController');
    //  Route::resource('/admin/danhsachchude','ChudeController');
    //  Route::resource('/admin/danhsachlinhvuc','LinhvucController');
    //  Route::resource('/admin/danhsachnhanvien','NhanvienController');
    //  Route::resource('/admin/danhsachslide','SLideController');
    
    //  Route::resource('/admin/danhsachbaiviet','BaivietController');
    // Route::group(['prefix'=>'ajax'],function(){
    //     Route::get('chude/{lv_ma}','AjaxController@getChuDe');
    // });
// //});
 Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@getdangnhapAdmin');
// Route::post('/home','HomeController@postdangnhapAdmin');
 Route::get('/home', 'HomeController@getdangxuatAdmin');

Route::post('logintest','TestController@check');
//Route::post('logout','TestController@logout');

Route::get('/', 'FrontendController@index')->name('frontend.home');