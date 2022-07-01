<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessSupportController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainReactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceGuideController;
use App\Http\Controllers\SubmitRequestController;



//todos
Route::get('/todos/{type}',[TodoController::class, 'index'])->name('todo.index');
// Route::get('/todos/create',[TodoController::class,'create'])->name('todo.create');;
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todo.edit');
Route::get('/todos/{todo}',[TodoController::class, 'show'])->name('todo.show');
Route::post('/todos/{todo}', [TodoController::class, 'update'])->name('todo.update');
Route::post('/todos/{todo}/delete',[TodoController::class, 'destroy']);
Route::post('/todos/store',[TodoController::class, 'store'])->name('todo.store');;

Auth::routes();


Route::post('/services/create',[ServiceController::class, 'create']);
Route::get('/services',[ServiceController::class, 'getAll']);
Route::get('/services/businesssupport/{serviceid}',[ServiceController::class, 'show']);
Route::get('/services/facilities/{serviceid}',[ServiceController::class, 'show']);
Route::get('/services/homeoffice/{serviceid}',[ServiceController::class, 'show']);
Route::get('/services/finance/{serviceid}',[ServiceController::class, 'show']);
Route::get('/services/hrpayroll/{serviceid}',[ServiceController::class, 'show']);
Route::get('/services/itservices/{serviceid}',[ServiceController::class, 'show']);
Route::get('/services/masterdata/{serviceid}',[ServiceController::class, 'show']);
Route::get('/services/{servicetype}',[ServiceController::class, 'index']);
Route::get('/service/edit/{service}',[ServiceController::class, 'edit']);
Route::post('/service/edit/{service}',[ServiceController::class, 'update']);
Route::post('/services/{query}',[ServiceController::class, 'search']);

Route::get('/services/search/{key}',[ServiceController::class, 'searchKey']);

//serviceguide
Route::get('/serviceguide',[ServiceGuideController::class, 'index']);
Route::post('/serviceguide/show',[ServiceGuideController::class, 'show']);
Route::post('/serviceguide/create',[ServiceGuideController::class, 'create']);
Route::post('/serviceguide/update/{serviceGuide}',[ServiceGuideController::class, 'update']);
Route::post('/serviceguide/remove/{serviceGuide}',[ServiceGuideController::class, 'remove']);


Route::get('/user/auth',[UserController::class, 'authUser']);
Route::get('/allusers',[UserController::class, 'allUsers']);
Route::post('/user/logout',[UserController::class, 'logout']);
Route::get('/user/isadmin',[UserController::class, 'isAdmin']);

//submit serivce request
Route::get('/submitservicerequest',[SubmitRequestController::class, 'index']);
Route::get('/submitservicerequest/{id}',[SubmitRequestController::class, 'show']);
Route::post('/submitservicerequest',[SubmitRequestController::class, 'submit']);
Route::post('/submitservicerequest/{id}', [SubmitRequestController::class, 'update']);

Route::post('/setadmin/{id}', [UserController::class, 'setadmin']);


// Route::post('/api/login',[LoginController::class, 'login']);

// Route::get('/api/users',[UserController::class, 'index']);

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::fallback([App\Http\Controllers\MainReactController::class, 'index']);
