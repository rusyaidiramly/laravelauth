<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Redirect unauthenticate routes request to route('login')
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('/logout', function () {
        UserController::logout();
        return redirect('/');
    });
});

Route::name('login')->get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::post('/login', function (Request $request) {
    UserController::login($request);
    return redirect('/');
});
Route::post('/register', function (Request $request) {
    UserController::register($request, false);
    UserController::login($request);
    return redirect('/');
});

// Route::get('/userlist', function () {
//     return view('userlist', ['users' => UserController::index()]);
// });
// Route::get('/profile', function () {
//     return view('profile', ['user' => UserController::show(Session::get('usersession')->id)]);
// });
// Route::get('/userlist/search', function (Request $request) {
//     if($request->q=='') return redirect('/userlist');
//     return view('userlist', ['users' => UserController::search($request->q), 'searchStr' => $request->q]);
// });
