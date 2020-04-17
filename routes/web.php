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


Route::get('/', function () {
    return view('welcome');
});

Route::get('login','dangnhapController@getLogin')->name('getlogin');
Route::post('dangnhap','dangnhapController@Login')->name('login');

Route::get('register','dangkycontroller@getRegister')->name('getregister');
Route::post('dangky','dangkycontroller@Register')->name('register');

Route::get('addadmin','dangkycontroller@getaddadmin')->name('getaddadmin')->middleware('isadmin');
Route::post('themadmin','dangkycontroller@addadmin')->name('addadmin');
Route::post('edit','homeController@editUser')->name('editUser');
Route::post('del','homeController@delUser')->name('delUser');

Route::get('logout','dangnhapcontroller@logout')->name('logout');

Route::get('quanlynguoidung', 'homecontroller@quanlyUser')->name('quanly')->middleware('isadmin');

Route::get('home','homecontroller@gethome')->name('home');

Route::get('infor','dangnhapController@infor')->name('infor');

Route::get('danhsachdetai','homecontroller@alldt')->name('dsdetai');

Route::get('duyet','homecontroller@getduyetdt')->name('getduyetdt')->middleware('isadmin');
Route::post('duyetdt','homecontroller@duyetdt')->name('duyetdt');
Route::post('delduyetdt','homecontroller@duyetdt')->name('delduyetdt');

Route::get('dangkydetai','homecontroller@getdkdetai')->name('getdkdetai');
Route::post('xulydangkydetai','homecontroller@dkdetai')->name('dkdetai');

Route::get('data','DataController@defaultdata')->name('data');

Route::group(['prefix'=>'thamkhao'],function(){
    Route::get('danhsach','homeController@thamkhao')->name('thamkhao');
    Route::post('add','homeController@addThamkhao')->name('addthamkhao');
    Route::post('edit','homeController@editThamkhao')->name('editthamkhao');
    Route::post('del','homeController@delThamkhao')->name('delthamkhao');
});
