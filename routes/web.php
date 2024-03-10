<?php

use App\Models\User;
use App\Models\Brand;
use App\Models\HomeAbout;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeAboutController;
use App\Http\Controllers\ServiceController;


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands = Brand::all();
   // $brands = DB::table('brands')->get();
    //$abouts = HomeAbout::first();
    $abouts = DB::table('home_abouts')->first();
    return view('home', compact('brands', 'abouts'));
});

Route::get('/home', function () {
    return "Home page";
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

Route::get('/dashboard', function () {
    //$users = User::all();
    $users = DB::table('users')->get();
    return view('admin.index', compact('users'));

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



//Category
Route::get('category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('category/add', [CategoryController::class, 'AddCat'])->name('store.category');
Route::get('category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('category/update/{id}', [CategoryController::class, 'Update']);
Route::get('softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

//Brand
Route::get('brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

//MULTI IMAGES
// Multi Image Route
Route::get('/multi/image', [BrandController::class, 'Multipic'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');

//ADMIN ALL ROUTES
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('slider/edit/{id}', [HomeController::class, 'EditSlider']);
Route::post('edit/update/{id}', [HomeController::class, 'UpdateSlider']);
Route::get('slider/delete/{id}', [HomeController::class, 'Delete']);

//HOME ABOUT
Route::get('/home/about', [HomeAboutController::class, 'HomeAbout'])->name('home.about');
Route::post('/about/add', [HomeAboutController::class, 'StoreAbout'])->name('store.about');
Route::get('about/edit/{id}', [HomeAboutController::class, 'EditAbout']);
Route::post('about/update/{id}', [HomeAboutController::class, 'UpdateAbout']);
Route::get('about/delete/{id}', [HomeAboutController::class, 'DeleteAbout']);

//SERVICES
Route::get('/home/services', [ServiceController::class, 'HomeServices'])->name('home.services');
Route::post('/store/service', [ServiceController::class, 'StoreServices'])->name('store.service');
Route::get('/service/edit/{id}', [ServiceController::class, 'EditService']);
Route::post('service/update/{id}', [ServiceController::class, 'UpdateService']);
Route::get('/service/delete/{id}', [ServiceController::class, 'DeleteService']);