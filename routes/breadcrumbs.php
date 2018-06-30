<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__("Trang chủ"), route('home'));
});

// login
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Đăng nhập"), route('login'));
});

// register
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Đăng ký"), route('register'));
});

// Forget password
Breadcrumbs::for('password.request', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Quên mật khẩu"), route('password.request'));
});

// Reset password
Breadcrumbs::for('password.reset', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Đặt lại mật khẩu"), route('password.reset'));
});

// Categories
Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Danh mục sản phẩm"), route('categories.index'));
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
    $trail->push(__("Giỏ hàng của tôi"), route('cart.index'));
});

// Checkout
Breadcrumbs::for('checkout.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Kiểm tra giỏ hàng"), route('checkout.index'));
});


// Admin
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__("Dashboard"), route('admin.dashboard'));
});

// categories
Breadcrumbs::for('admin.categories', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__("Catalog Management"), route('admin.categories.index'));
});

// Category show
Breadcrumbs::for('admin.categories.show', function ($trail, $category) {
    $trail->parent('admin.categories');
    $trail->push(__(":name", ['name' => $category->name]));
});

// create
Breadcrumbs::for('admin.categories.create', function ($trail) {
    $trail->parent('admin.categories');
    $trail->push(__("Create"), route('admin.categories.create'));
});

// edit
Breadcrumbs::for('admin.categories.edit', function ($trail, $category) {
    $trail->parent('admin.categories.show', $category);
    $trail->push(__("Edit"), route('admin.categories.edit', $category));
});

// Products
Breadcrumbs::for('admin.users', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__("Users Management"), route('admin.users.index'));
});

// Products
Breadcrumbs::for('admin.users.show', function ($trail, $user) {
    $trail->parent('admin.users');
    $trail->push($user->email);
});


// Products
Breadcrumbs::for('admin.products', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__("Product Management"), route('admin.products.index'));
});

// Products
Breadcrumbs::for('admin.products.show', function ($trail, $product) {
    $trail->parent('admin.products');
    $trail->push(__(":name", ['name' => $product->name]));
});

// Products.create
Breadcrumbs::for('admin.products.create', function ($trail) {
    $trail->parent('admin.products');
    $trail->push(__("Add new product"), route('admin.products.create'));
});

// Products
Breadcrumbs::for('admin.products.edit', function ($trail, $product) {
    $trail->parent('admin.products.show', $product);
    $trail->push(__("Edit"));
});

// Orders
Breadcrumbs::for('admin.orders', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__("Orders Management"), route('admin.orders.index'));
});

// Orders
Breadcrumbs::for('admin.orders.show', function ($trail, $order) {
    $trail->parent('admin.orders');
    $trail->push(__("Order :id", ["id" => $order->id]));
});

// Orders
Breadcrumbs::for('admin.orders.edit', function ($trail, $order) {
    $trail->parent('admin.orders.show', $order);
    $trail->push(__("Edit"));
});

// me
Breadcrumbs::for('account', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Tài khoản"), route('account.user'));
});

// my orders
Breadcrumbs::for('account.orders', function ($trail) {
    $trail->parent('account');
    $trail->push(__("Lịch sử đơn hàng"), route('account.orders.index'));
});

Breadcrumbs::for('account.orders.show', function ($trail, $order) {
    $trail->parent('account.orders');
    $trail->push(__("# :id", ['id' => $order->id]), route('account.orders.show', $order));
});

// me
Breadcrumbs::for('search', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Tìm kiếm"), route('search.index'));
});

// me
Breadcrumbs::for('pages.term', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Điều khoản sử dụng"), route('pages.term'));
});

// me
Breadcrumbs::for('pages.contact', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Thông tin liên hệ"), route('pages.contact'));
});

// me
Breadcrumbs::for('pages.faq', function ($trail) {
    $trail->parent('home');
    $trail->push(__("FAQ"), route('pages.faq'));
});

// me
Breadcrumbs::for('pages.error', function ($trail) {
    $trail->parent('home');
    $trail->push(__("404 Not Found"), route('pages.error'));
});

// me
Breadcrumbs::for('pages.about', function ($trail) {
    $trail->parent('home');
    $trail->push(__("Giới thiệu"), route('pages.about'));
});

// Tags
Breadcrumbs::for('admin.tags', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__("Tags Managerment"), route('admin.tags.index'));
});

// Tags
Breadcrumbs::for('admin.tags.create', function ($trail) {
    $trail->parent('admin.tags');
    $trail->push(__("Create"), route('admin.tags.create'));
});

// Tags
Breadcrumbs::for('admin.tags.show', function ($trail, $tag) {
    $trail->parent('admin.tags');
    $trail->push($tag->name, route('admin.tags.show', $tag));
});

// Tags
Breadcrumbs::for('admin.tags.edit', function ($trail, $tag) {
    $trail->parent('admin.tags.show', $tag);
    $trail->push($tag->name, route('admin.tags.edit', $tag));
});

// Settings
Breadcrumbs::for('admin.settings', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__("Settings"), route('admin.settings.index'));
});

// Settings
Breadcrumbs::for('admin.settings.slider', function ($trail) {
    $trail->parent('admin.settings');
    $trail->push(__("Slider"), route('admin.settings.slider'));
});
