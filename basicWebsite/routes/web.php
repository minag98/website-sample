<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Post;
use App\Models\HomeSlider;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'details'])->name('HomeController.home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $user=Auth::user();
    $categories=Category::all();
    if (Auth::user()->utype === 'USR') {
        $posts=Post::where('user_id',$user->id)->get();
        return view('user.index',compact('user','categories','posts'));
    }
    elseif(Auth::user()->utype === 'ADM'){
        $posts=Post::latest()->get();
        $sliders=HomeSlider::latest()->get();
        return view('admin.index',compact('user','categories','posts','sliders'));
    }else{
        return route('login');
    }
})->name('dashboard');



Route::get('/user-logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/change-password', [UserController::class, 'changePass'])->name('change.pass');
Route::post('/update-password', [UserController::class, 'updatePass'])->name('password.update');
Route::get('/profile', [UserController::class, 'profile'])->name('profile.info');
Route::post('/update-image/{id}', [UserController::class, 'updateImage'])->name('update.pic');
Route::post('/update-profile/{id}', [UserController::class, 'updateProfile'])->name('update.pro');

Route::get('/category', [DataController::class, 'category'])->name('category');
Route::get('/user-add-category', [DataController::class, 'uCategory'])->name('uCategory');
Route::post('/add_category', [DataController::class, 'addCat'])->name('add.category');
Route::get('/post', [DataController::class, 'post'])->name('post');
Route::get('/uPost', [DataController::class, 'uPost'])->name('uPost');
Route::post('/add-post', [DataController::class, 'addPost'])->name('add.post');
Route::get('/delete-post/{id}', [DataController::class, 'deletePost'])->name('delete.post');
Route::get('/delete-category/{id}', [DataController::class, 'deleteCategory'])->name('delete.cat');
Route::get('/slider', [DataController::class, 'Slider'])->name('slider');
Route::post('/add-slider', [DataController::class, 'addSlider'])->name('add.slider');
Route::post('/show-slider', [DataController::class, 'showSlider'])->name('show.slider');
Route::get('/delete-slider/{id}', [DataController::class, 'deleteSlider'])->name('delete.slider');
Route::get('/users-post', [DataController::class, 'usersPost'])->name('users.post');
Route::get('/details/{id}', [DataController::class, 'details'])->name('post.details');
Route::get('/category-post/{id}', [DataController::class, 'showPostInCategory'])->name('category.post');
Route::get('/user-page/{id}', [DataController::class, 'userPostsPage'])->name('user.page');
Route::get('/user', [DataController::class, 'users']);
Route::get('/team', [DataController::class, 'teams']);