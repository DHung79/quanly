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

Route::group(['prefix'=>'duyetdetai'],function(){
Route::get('danhsach','homecontroller@getduyetdt')->name('getduyetdt')->middleware('isadmin');
Route::post('duyet','homecontroller@duyetdt')->name('duyetdt');
Route::post('del','homecontroller@delduyetdetai')->name('delduyetdt');
});

Route::get('dangkydetai','homecontroller@getdkdetai')->name('getdkdetai')->middleware('isdaduyet');
Route::post('xulydangkydetai','homecontroller@dkdetai')->name('dkdetai');

Route::get('data','DataController@defaultdata')->name('data');

Route::group(['prefix'=>'thamkhao'],function(){
    Route::get('danhsach','homeController@thamkhao')->name('thamkhao');
    Route::post('tailieu','homeController@tailieu')->name('tailieu');
    Route::post('add','homeController@addThamkhao')->name('addthamkhao');
    Route::post('edit','homeController@editThamkhao')->name('editthamkhao');
    Route::post('del','homeController@delThamkhao')->name('delthamkhao');
});

Route::get('detai/{id}','homeController@userdetai')->name('userdetai');
Route::post('editdetai','homeController@editdetai')->name('editdetai');
Route::post('deldetai','homeController@deldetai')->name('deldetai');

Route::group(['prefix'=>'sukien'],function(){
Route::get('danhsach','homeController@dssukien')->name('dssukien')->middleware('isadmin');
Route::get('{id}','homeController@sukien')->name('sukien');
Route::post('add','homeController@addsukien')->name('addsukien');
Route::post('del','homeController@delsukien')->name('delsukien');
Route::post('edit','homeController@editsukien')->name('editsukien');
});

Route::post('delfile','homeController@delfile')->name('delfile');
Route::get('sinhvienhuongdan','homeController@svhd')->name('svhd');