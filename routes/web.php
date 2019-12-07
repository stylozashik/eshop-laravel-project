<?php

// User's URL's

use App\Http\Controllers\AdminController;

Route::get('/', 'HomeController@index');
Route::get('/category/{category}/products', 'HomeController@category_products');
Route::get('/brand/{brand}/products', 'HomeController@brand_products');
Route::get('/product/{Product}/details', 'HomeController@product_details');
Route::get('/shop', 'HomeController@shop');


// Admin URL's
Route::get('/admin-login','AdminController@admin_login');
Route::get('/logout','SuperAdminController@logout');
Route::get('/dashboard','SuperAdminController@index');
Route::get('/dashboard/orders','OrderController@orders_view');
Route::get('/dashboard/customers','CustomerController@customer_view');
Route::get('/dashboard/messages','ContactController@messages_view');
Route::post('/admin-dashboard','AdminController@dashboard_data');

//Category url's
Route::get('/dashboard/categories','CategoryController@index');
Route::get('/dashboard/categories/add','CategoryController@create');
Route::post('/dashboard/categories/add','CategoryController@store');
Route::get('/dashboard/categories/{category}/edit','CategoryController@edit');
Route::patch('/dashboard/categories/{category}','CategoryController@update');
Route::delete('/dashboard/categories/{category}','CategoryController@destroy');
Route::get('/dashboard/categories/{category}','CategoryController@show');
Route::get('/dashboard/categories/{category}/inactive','CategoryController@inactive');
Route::get('/dashboard/categories/{category}/active','CategoryController@active');


//Brands url's
Route::get('/dashboard/brands','BrandController@index');
Route::get('/dashboard/brands/add','BrandController@create');
Route::post('/dashboard/brands/add','BrandController@store');
Route::get('/dashboard/brands/{brand}/edit','BrandController@edit');
Route::patch('/dashboard/brands/{brand}','BrandController@update');
Route::delete('/dashboard/brands/{brand}','BrandController@destroy');
Route::get('/dashboard/brands/{brand}','BrandController@show');
Route::get('/dashboard/brands/{brand}/inactive','BrandController@inactive');
Route::get('/dashboard/brands/{brand}/active','BrandController@active');



//Product url's
Route::get('/dashboard/products','ProductController@index');
Route::get('/dashboard/products/add','ProductController@create');
Route::post('/dashboard/products/add','ProductController@store');
Route::get('/dashboard/products/{product}/edit','ProductController@edit');
Route::patch('/dashboard/products/{product}','ProductController@update');
Route::delete('/dashboard/products/{product}','ProductController@destroy');
Route::get('/dashboard/products/{product}','ProductController@show');
Route::get('/dashboard/products/{product}/inactive','ProductController@inactive');
Route::get('/dashboard/products/{product}/active','ProductController@active');


//Cart url's
Route::post('/cart','CartController@add_to_cart');
Route::get('/cart/show','CartController@show_cart');
Route::get('/cart/show/{rowId}','CartController@delete_cart');
Route::post('/cart/update','CartController@update_cart');

//Checkout url's
Route::get('/checkout','CheckoutController@checkout');
Route::get('/login-check','CheckoutController@login_check');
Route::post('/customer-registration','CheckoutController@customer_registration');
Route::post('/customer-login','CheckoutController@customer_login');
Route::get('/customer-logout','CheckoutController@customer_logout');
Route::post('/complete-order','CheckoutController@complete_order');

//Orders url's
Route::get('/payment','OrderController@payment');
Route::post('/confirm-order','OrderController@confirm_order');
Route::get('/congratulations','OrderController@congratulations');
Route::get('/dashboard/orders/{Order}/inactive','OrderController@inactive');
Route::get('/dashboard/orders/{Order}/active','OrderController@active');
Route::get('/dashboard/orders/{Order}/details','OrderController@detail_view');

//Delivery url's
Route::get('/dashboard/delivery','DeliveryController@index');

//Contact url's
Route::get('/contact','ContactController@contact');
Route::post('/contact/send','ContactController@send_message');
Route::get('/contact/success','ContactController@success');

