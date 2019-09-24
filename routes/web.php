<?php


Route::get('/',[
    'uses'=> 'EcommerceController@index',
    'as'  => '/'
]);

Route::get('/category-product/{id}',[
    'uses' => 'EcommerceController@categoryProduct',
    'as'   =>'category-product'
]);

Route::get('/product-details/{id}',[
    'uses' => 'EcommerceController@productDetail',
    'as'   =>'product-details'
]);

Route::post('/cart/add-to-cart',[
    'uses' => 'cartController@addToCart',
    'as'   =>'add-to-cart'
]);

Route::get('/cart/show-cart',[
    'uses' => 'cartController@showCart',
    'as'   =>'show-cart'
]);

Route::post('/cart/update-cart-product',[
    'uses' => 'cartController@updateCart',
    'as'   =>'update-cart-product'
]);

Route::get('/cart/remove-cart-product/{id}',[
    'uses' => 'cartController@removeCartProduct',
    'as'   =>'remove-cart-product'
]);





Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



//add category route......
Route::get('/category/add-category',[
	'uses' => 'CategoryController@addCategory',
    'as'   =>'add-category'
]);

Route::post('/category/new-category',[
	'uses' => 'CategoryController@newCategory',
    'as'   =>'new-category'
]);

Route::get('/category/edit-category/{id}',[
	'uses' => 'CategoryController@editCategory',
    'as'   =>'edit-category'
]);

Route::post('/category/update-category',[
	'uses' => 'CategoryController@updateCategory',
    'as'   =>'update-category'
]);

Route::get('/category/delete-category/{id}',[
	'uses' => 'CategoryController@deleteCategory',
    'as'   =>'delete-category'
]);

Route::get('/category/manage-category',[
	'uses' => 'CategoryController@manageCategory',
    'as'   =>'manage-category'
]);



//brand route.........
Route::get('/brand/add-brand',[
	'uses' => 'BrandController@addBrand',
    'as'   =>'add-brand'
]);

Route::post('/brand/new-brand',[
	'uses' => 'BrandController@newBrand',
    'as'   =>'new-brand'
]);

Route::get('/brand/manage-brand',[
	'uses' => 'BrandController@manageBrand',
    'as'   =>'manage-brand'
]);

Route::get('/brand/edit-brand/{id}',[
    'uses' => 'BrandController@editBrand',
    'as'   =>'edit-brand'
]);

Route::post('/brand/update-brand',[
    'uses' => 'BrandController@updateBrand',
    'as'   =>'update-brand'
]);

Route::get('/brand/delete-brand/{id}',[
    'uses' => 'BrandController@deleteBrand',
    'as'   =>'delete-brand'
]);







//product route.......
Route::get('/product/add-product',[
	'uses' => 'ProductController@addProduct',
    'as'   =>'add-product'
]);

Route::post('/product/new-product',[
	'uses' => 'ProductController@newProduct',
    'as'   =>'new-product'
]);

Route::get('/product/manage-product',[
	'uses' => 'ProductController@manageProduct',
    'as'   =>'manage-product'
]);

Route::get('/product/get-category-brand-name/{ida}/{idb}',[
    'uses' => 'ProductController@getCategoryBrandName',
    'as'   =>'get-category-name-by-id'
]);

Route::get('/product/view-product/{id}',[
    'uses' => 'ProductController@viewProduct',
    'as'   =>'view-product'
]);