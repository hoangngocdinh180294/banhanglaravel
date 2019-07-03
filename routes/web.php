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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**--------------------------------------------------------------------------------
 * Trang admin
 * --------------------------------------------------------------------------------
 */
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [
            'as' => 'user.index',
            'uses' => 'UserController@index',
            'middleware' => 'check_quyen:user-list',
        ]);
        Route::get('/create', [
            'as' => 'user.add',
            'uses' => 'UserController@create',
            'middleware' => 'check_quyen:user-add',
        ]);
        Route::post('/create', [
            'as' => 'user.store',
            'uses' => 'UserController@store',
            'middleware' => 'check_quyen:user-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'user.edit',
            'uses' => 'UserController@edit',
            'middleware' => 'check_quyen:user-edit',
        ]);
        Route::post('/edit/{id}', [
            'as' => 'user.update',
            'uses' => 'UserController@update',
            'middleware' => 'check_quyen:user-edit',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'user.delete',
            'uses' => 'UserController@delete',
            'middleware' => 'check_quyen:user-delete',
        ]);
    });
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [
            'as' => 'role.index',
            'uses' => 'RoleController@index',
            'middleware' => 'check_quyen:role-list',
        ]);
        Route::get('/create', [
            'as' => 'role.add',
            'uses' => 'RoleController@create',
            'middleware' => 'check_quyen:role-add',
        ]);
        Route::post('/create', [
            'as' => 'role.store',
            'uses' => 'RoleController@store',
            'middleware' => 'check_quyen:role-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'role.edit',
            'uses' => 'RoleController@edit',
            'middleware' => 'check_quyen:role-edit',
        ]);
        Route::post('/edit/{id}', [
            'as' => 'role.update',
            'uses' => 'RoleController@update',
            'middleware' => 'check_quyen:role-edit',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'role.delete',
            'uses' => 'RoleController@delete',
            'middleware' => 'check_quyen:role-delete',
        ]);
    });
    Route::group(['prefix' => 'slide'], function () {
        Route::get('/', [
            'as' => 'slide.index',
            'uses' => 'SlideController@index',
            'middleware' => 'check_quyen:slide-list',
        ]);
        Route::get('/create', [
            'as' => 'slide.add',
            'uses' => 'SlideController@create',
            'middleware' => 'check_quyen:slide-add',
        ]);
        Route::post('/create', [
            'as' => 'slide.store',
            'uses' => 'SlideController@store',
            'middleware' => 'check_quyen:slide-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slide.edit',
            'uses' => 'SlideController@edit',
            'middleware' => 'check_quyen:slide-edit',
        ]);
        Route::post('/edit/{id}', [
            'as' => 'slide.update',
            'uses' => 'SlideController@update',
            'middleware' => 'check_quyen:slide-edit',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slide.delete',
            'uses' => 'SlideController@delete',
            'middleware' => 'check_quyen:slide-delete',
        ]);
    });
    Route::group(['prefix' => 'loaisanpham'], function () {
        Route::get('/', [
            'as' => 'typeproduct.index',
            'uses' => 'TypeproductController@index',
            'middleware' => 'check_quyen:typeproduct-list',
        ]);
        Route::get('/create', [
            'as' => 'typeproduct.add',
            'uses' => 'TypeproductController@create',
            'middleware' => 'check_quyen:typeproduct-add',
        ]);
        Route::post('/create', [
            'as' => 'typeproduct.store',
            'uses' => 'TypeproductController@store',
            'middleware' => 'check_quyen:typeproduct-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'typeproduct.edit',
            'uses' => 'TypeproductController@edit',
            'middleware' => 'check_quyen:typeproduct-edit',
        ]);
        Route::post('/edit/{id}', [
            'as' => 'typeproduct.update',
            'uses' => 'TypeproductController@update',
            'middleware' => 'check_quyen:typeproduct-edit',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'typeproduct.delete',
            'uses' => 'TypeproductController@delete',
            'middleware' => 'check_quyen:typeproduct-delete',
        ]);
    });
    Route::group(['prefix' => 'sanpham'], function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'ProductController@index',
            'middleware' => 'check_quyen:product-list',
        ]);
        Route::get('/create', [
            'as' => 'product.add',
            'uses' => 'ProductController@create',
            'middleware' => 'check_quyen:product-add',
        ]);
        Route::post('/create', [
            'as' => 'product.store',
            'uses' => 'ProductController@store',
            'middleware' => 'check_quyen:product-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'ProductController@edit',
            'middleware' => 'check_quyen:product-edit',
        ]);
        Route::post('/edit/{id}', [
            'as' => 'product.update',
            'uses' => 'ProductController@update',
            'middleware' => 'check_quyen:product-edit',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'ProductController@delete',
            'middleware' => 'check_quyen:product-delete',
        ]);
    });
    Route::group(['prefix' => 'khachhang'], function () {
        Route::get('/', [
            'as' => 'khachhang.index',
            'uses' => 'KhachhangController@index',
            'middleware' => 'check_quyen:khachhang-list',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'khachhang.delete',
            'uses' => 'KhachhangController@delete',
            'middleware' => 'check_quyen:khachhang-delete',
        ]);
    });
    Route::group(['prefix' => 'hoadon'], function () {
        Route::get('/', [
            'as' => 'bill.index',
            'uses' => 'BillController@index',
            'middleware' => 'check_quyen:hoadon-list',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'bill.edit',
            'uses' => 'BillController@edit',
            'middleware' => 'check_quyen:hoadon-edit',
        ]);
        Route::post('/edit/{id}', [
            'as' => 'bill.update',
            'uses' => 'BillController@update',
            'middleware' => 'check_quyen:hoadon-edit',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'bill.delete',
            'uses' => 'BillController@delete',
            'middleware' => 'check_quyen:hoadon-delete',
        ]);
    });
    Route::group(['prefix' => 'chitiethoadon'], function () {
        Route::get('/{id}', [
            'as' => 'bill_details.index',
            'uses' => 'Bill_detailController@index',
            'middleware' => 'check_quyen:chitiethoadon-list',
        ]);
    });
    Route::group(['prefix' => 'lienhekhachhang'], function () {
        Route::get('/', [
            'as' => 'lienhekhachhang.index',
            'uses' => 'AdminlienheController@index',
            'middleware' => 'check_quyen:lienhekhachhang-list',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'lienhekhachhang.delete',
            'uses' => 'AdminlienheController@delete',
            'middleware' => 'check_quyen:lienhekhachhang-delete',
        ]);
    });
    Route::group(['prefix' => 'gioithieukhachhang'], function () {
        Route::get('/', [
            'as' => 'gioithieukhachhang.index',
            'uses' => 'GioithieuController@index',
            'middleware' => 'check_quyen:gioithieukhachhang-list',
        ]);
        Route::get('/create', [
            'as' => 'gioithieukhachhang.add',
            'uses' => 'GioithieuController@create',
            'middleware' => 'check_quyen:gioithieukhachhang-add',
        ]);
        Route::post('/create', [
            'as' => 'gioithieukhachhang.store',
            'uses' => 'GioithieuController@store',
            'middleware' => 'check_quyen:gioithieukhachhang-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'gioithieukhachhang.edit',
            'uses' => 'GioithieuController@edit',
            'middleware' => 'check_quyen:gioithieukhachhang-edit',
        ]);
        Route::post('/edit/{id}', [
            'as' => 'gioithieukhachhang.update',
            'uses' => 'GioithieuController@update',
            'middleware' => 'check_quyen:gioithieukhachhang-edit',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'gioithieukhachhang.delete',
            'uses' => 'GioithieuController@delete',
            'middleware' => 'check_quyen:gioithieukhachhang-delete',
        ]);
    });
});
/**------------------------------------------------------------------------------------------------------
 * Trang chủ
 * ------------------------------------------------------------------------------------------------------
 */
Route::group(['prefix' => 'trangchu'], function () {
    Route::get('/index', [
        'as' => 'index',
        'uses' => 'PageController@getindex',
    ]);
    Route::get('/loaisanpham/{id}', [
        'as' => 'loaisanpham',
        'uses' => 'PageController@getloaisp',
    ]);
    Route::get('/chitietloaisanpham/{id}', [
        'as' => 'chitietloaisanpham',
        'uses' => 'PageController@getchitietloaisp',
    ]);
    Route::get('/gioithieu', [
        'as' => 'gioithieu',
        'uses' => 'PageController@getgioithieu',
    ]);
    Route::get('/lienhe', [
        'as' => 'getlienhe',
        'uses' => 'LienheController@getlienhe',
    ]);
    Route::post('/lienhe', [
        'as' => 'postlienhe',
        'uses' => 'LienheController@postlienhe',
    ]);

    Route::get('/timkiem', [
        'as' => 'timkiem',
        'uses' => 'PageController@gettimkiem',
    ]);

    Route::group(['prefix' => 'shopping'], function () {
        Route::get('/add/{id}', 'ShoppingCartController@addProduct')->name('add.shopping.cart');
        Route::get('/list', 'ShoppingCartController@getlistshoppingcart')->name('list.shopping.cart');
        Route::post('/update/{rowId}', 'ShoppingCartController@updateshoppingcart')->name('update.shopping.cart');
        Route::get('/delete/{rowId}', 'ShoppingCartController@delete')->name('delete.shopping.cart');
    });
    Route::group(['prefix' => 'thanhtoan'], function () {
        Route::get('/', 'ShoppingCartController@thanhtoan')->name('list.thanhtoan.cart');
        Route::post('/sendemail', 'ShoppingCartController@sendemail')->name('senemail.thanhtoan.cart');
        Route::post('/sendemail', 'ShoppingCartController@sendemail')->name('senemail.thanhtoan.cart');
    });
});



