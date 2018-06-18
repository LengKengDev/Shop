<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__("Home"), route('home'));
});

// login
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push(__(__("Login")), route('login'));
});

// register
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push(__(__("Register")), route('register'));
});

// Forget password
Breadcrumbs::for('password.request', function ($trail) {
    $trail->parent('home');
    $trail->push(__(__("Forget password")), route('password.request'));
});

// Reset password
Breadcrumbs::for('password.reset', function ($trail) {
    $trail->parent('home');
    $trail->push(__(__("Reset password")), route('password.reset'));
});

