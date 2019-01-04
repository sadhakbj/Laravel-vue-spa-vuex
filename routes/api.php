<?php

use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$this->group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    $this->post('login', 'AuthController@login')->name('login');
    $this->post('register', 'AuthController@register')->name('register');
    $this->get('current-user', 'AuthController@getCurrentUser')->name('current-user')->middleware('auth:api');
    $this->delete('logout', 'AuthController@logOut')->name('log-out')->middleware('auth:api');
});


Route::get('/users/list', function () {
    $users = app(User::class)->all();

    return response()->json($users);
})->name('users.list');

Route::resource('/authors', 'AuthorController');
