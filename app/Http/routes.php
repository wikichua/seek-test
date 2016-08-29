<?php

Route::get('/',array('as'=>'home','uses'=>'HomeController@index'));

Route::get('/customer', array('as'=>'customer','uses'=>'CustomerController@index'));
Route::get('/customer/create', array('as'=>'customer.create','uses'=>'CustomerController@create'));
Route::post('/customer/store', array('as'=>'customer.store','uses'=>'CustomerController@store'));
Route::get('/customer/{id}/edit', array('as'=>'customer.edit','uses'=>'CustomerController@edit'));
Route::put('/customer/{id}/update', array('as'=>'customer.update','uses'=>'CustomerController@update'));
Route::delete('/customer/{id}/destroy', array('as'=>'customer.destroy','uses'=>'CustomerController@destroy'));
Route::get('/customer/{id}/shift/{shift_id}', array('as'=>'customer.shift','uses'=>'CustomerController@shift'));

Route::get('/item', array('as'=>'item','uses'=>'ItemController@index'));
Route::get('/item/create', array('as'=>'item.create','uses'=>'ItemController@create'));
Route::post('/item/store', array('as'=>'item.store','uses'=>'ItemController@store'));
Route::get('/item/{id}/edit', array('as'=>'item.edit','uses'=>'ItemController@edit'));
Route::put('/item/{id}/update', array('as'=>'item.update','uses'=>'ItemController@update'));
Route::delete('/item/{id}/destroy', array('as'=>'item.destroy','uses'=>'ItemController@destroy'));
Route::get('/item/{id}/shift/{shift_id}', array('as'=>'item.shift','uses'=>'ItemController@shift'));

Route::get('/pricing/rule', array('as'=>'pricing_rule','uses'=>'PricingRuleController@index'));
Route::get('/pricing/rule/create', array('as'=>'pricing_rule.create','uses'=>'PricingRuleController@create'));
Route::post('/pricing/rule/store', array('as'=>'pricing_rule.store','uses'=>'PricingRuleController@store'));
Route::get('/pricing/rule/{id}/edit', array('as'=>'pricing_rule.edit','uses'=>'PricingRuleController@edit'));
Route::put('/pricing/rule/{id}/update', array('as'=>'pricing_rule.update','uses'=>'PricingRuleController@update'));
Route::delete('/pricing/rule/{id}/destroy', array('as'=>'pricing_rule.destroy','uses'=>'PricingRuleController@destroy'));
Route::get('/pricing/rule/{id}/shift/{shift_id}', array('as'=>'pricing_rule.shift','uses'=>'PricingRuleController@shift'));

Route::get('/checkout/{customer_id?}', array('as'=>'checkout','uses'=>'CheckoutController@index'));
Route::get('/checkout/create/{customer_id?}', array('as'=>'checkout.create','uses'=>'CheckoutController@create'));
Route::post('/checkout/store/{customer_id?}', array('as'=>'checkout.store','uses'=>'CheckoutController@store'));
Route::delete('/checkout/{id}/destroy/{customer_id?}', array('as'=>'checkout.destroy','uses'=>'CheckoutController@destroy'));
Route::get('/checkout/show/{customer_id?}', array('as'=>'checkout.show','uses'=>'CheckoutController@show'));