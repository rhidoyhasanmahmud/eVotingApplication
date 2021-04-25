<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\VoteController;


// Clear Cache, Config, Route, View
Route::get('/clear-all', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('clear-compiled');
    return "Cache of config, view, route, optimize Cleared!";
});

// LOGIN, SIGNUP AND LOGOUT
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/signup', [AuthController::class, 'signup_page'])->name('signup_page');
Route::get('/forget-password', [AuthController::class , 'forget_password_page'])->name('forgetpasswordpage');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/signup', [SignupController::class, 'signup']);
Route::get('/account_varification/{token}', [SignupController::class, 'account_verification'])->name('verify');
Route::post('/forget-password', [SignupController::class, 'forgetpassword']);
Route::get('/password-reset-view/{token}', [SignupController::class, 'passwordupdateverify'])->name('resetpassword');
Route::post('/passwordupdate', [SignupController::class, 'passwordupdate']);


Route::middleware(['auth'])->group(function () {

	Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('logout', [LogoutController::class, 'index']);

    // Permision handle
	Route::resource('/permissions', PermissionController::class)->except(['show']);
    Route::resource('/modules', ModuleController::class)->except(['show']);
    Route::get('/groups/{group_id}/permissions', [GroupController::class, 'showPermissions']);
    Route::post('/groups/{group_id}/permissions', [GroupController::class, 'submitPermissions']);
    Route::resource('/groups', GroupController::class)->except(['show']);

	// Users
    Route::resource('/users', UserController::class)->except(['show']);
    Route::get('/users/polling-station-users', [UserController::class, 'polling_station_index'])->name('polling_station_index');
    //	Password Update
    Route::get('/password-change', [ProfileController::class, 'password_change_index'])->name('password_change');
    Route::post('/password-update', [ProfileController::class, 'password_update']);

    // Profile
    Route::get('/profile-view', [ProfileController::class, 'profile_index'])->name('profile_view');
    Route::get('/profile-update-view', [ProfileController::class, 'profile_update_view'])->name('profile_update');
    Route::post('/user-profile-update', [ProfileController::class, 'profile_update'])->name('update_user_profile');

    Route::get('/all_votes', [VoteController::class, 'all_votes'])->name('all_votes');
    Route::get('/all_votes_by_country', [VoteController::class, 'all_votes_by_country'])->name('all_votes_by_country');
    Route::get('/view_Ans', [VoteController::class, 'view_Ans'])->name('view_Ans');
    Route::get('/question', [VoteController::class, 'question'])->name('question');
    Route::get('/vote', [VoteController::class, 'votepanel'])->name('votepanel');
    
     Route::get('/add_vote', [VoteController::class, 'add_vote'])->name('add_vote');
});