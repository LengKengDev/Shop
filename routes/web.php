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

Route::resource("/search", "SearchController", ["only" => ["index"]]);

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(["auth", "auth.admin"])->group(function () {
    Route::get("/", "DashboardController@index")->name("dashboard");
    Route::resource("categories", "CategoriesController", ['only' => ["index", "create", "edit", "update", "store", "destroy"]]);
    Route::resource("products", "ProductsController");
    Route::resource("orders", "OrdersController");
    Route::resource("users", "UsersController");

    Route::namespace('Api')->prefix('api')->name('api.')->middleware(["auth", "auth.admin"])->group(function () {
        Route::resource("products", "ProductsController", ["only" => "index"]);
        Route::resource("orders", "OrdersController", ["only" => "index"]);
        Route::resource("users", "UsersController", ["only" => "index"]);
    });
});

Route::namespace('Account')->prefix('account')->name('account.')->middleware(["auth"])->group(function () {
    Route::get("/", "UserController@index")->name("user");
    Route::post("/", "UserController@update")->name("user.update");
    Route::resource('orders', 'OrdersController', ['only' => ['index', 'show']]);
});

Route::get("term", "PagesController@term")->name("pages.term");
Route::get("contact", "PagesController@contact")->name("pages.contact");
Route::get("faq", "PagesController@faq")->name("pages.faq");;
Route::get("404", "PagesController@error")->name("pages.error");
Route::get("about", "PagesController@about")->name("pages.about");
