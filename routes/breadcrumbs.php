<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__("Home"), route('home'));
});

// login
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Login"), route('login'));
});

// register
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Register"), route('register'));
});

// Forget password
Breadcrumbs::for('password.request', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Forget password"), route('password.request'));
});

// Reset password
Breadcrumbs::for('password.reset', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Reset password"), route('password.reset'));
});

// Categories
Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Categories"), route('categories.index'));
});

// Categories
Breadcrumbs::for('categories.show1', function ($trail, $category) {
    $trail->parent('categories');
    $trail->push($category->name, route('categories.show', ["category" => $category]));
});

// Categories
Breadcrumbs::for('categories.show2', function ($trail, $category) {
    $trail->parent('categories.show1', $category->parent);
    $trail->push($category->name, route('categories.show', ["category" => $category]));
});

// products
Breadcrumbs::for('products.show', function ($trail, $product) {
    if ($product->categories->first->parent == null) {
        $trail->parent('categories.show1', $product->categories->first);
    }
    else {
        $trail->parent('categories.show2', $product->categories->first->parent);
    }
    $trail->push(__("Sản phẩm: :name", ['name' => $product->name]),
        route('products.show', ["product" => $product]));
});

// Cart
Breadcrumbs::for('cart.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Cart"), route('cart.index'));
});

// Checkout
Breadcrumbs::for('checkout.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Checkout"), route('checkout.index'));
});
