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

Route::get('/', function () {
    return view('index');
});

/*Frontend views*/
 

Route::get('/contact', function () {
    return view('frontend.contact');
});


Route::get('/login', function () {
    return view('frontend.auth.login');
});

Route::get('/register', function () {
    return view('frontend.auth.register');
});

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/partner', function () {
    return view('frontend.partner');
});

Route::get('/registerpartner', function () {
    return view('frontend.auth.registerPartner');
});
/*-------------Hashing ID for matricule*----------------*/

Route::bind('id', function ($id) {
    return Hasher::decode($id);
});

// GET /users/3kTMd
Route::get('/users/{id}', function($id) {
    // $id is now an int
    return User::find($id);
});
 