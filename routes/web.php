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

Auth::routes();

Route::resource("/", "HomeController", ["only" => ["index"]])->names(["index" => "home"]);

Route::resource("/categories", "CategoriesController", ["only" => ["index", "show"]]);

Route::resource("/products", "ProductsController", ["only" => ["show"]]);

Route::resource("/cart", "CartController", [
    "only" => ["index", "store", "update", "destroy"],
    "parameters" => ["cart" => "product"]
]);

Route::resource("/checkout", "CheckoutController", ["only" => ["index", "store", "show"]]);


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(["auth", "auth.admin"])->group(function () {
    Route::get("/", "DashboardController@index")->name("dashboard");
    Route::resource("categories", "CategoriesController", ['only' => ["index", "edit", "update"]]);
});
