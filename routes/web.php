<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () =>
    view('client.index')
);

Route::get('/create/user/account', fn () =>
    view('client.create_user_account')
);

Route::get('/user/login', fn () =>
    view('client.login_user')
);

Route::get('/home', fn () =>
    view('client.home')
);

Route::get('/user/profile', fn () =>
    view('client.user_profile')
);

Route::get('/admin/create/announcer', fn () =>
    view('admin.create_user')
);

Route::get('/admin/login/announcer', fn () =>
    view('admin.login_user')
);

Route::get('/admin/home', fn () =>
    view('admin.home')
);

Route::get('/admin/add/show', fn () =>
    view('admin.add_show')
);
