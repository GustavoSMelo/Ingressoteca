<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.index');
});

Route::get('/create/user/account', function () {
    return view('client.create_user_account');
});
