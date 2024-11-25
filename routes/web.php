<?php

use App\Http\Controllers\AboutTeamSectionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BotmanController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Frontend\Dashboard\About\AboutCompanySectionController;
use App\Http\Controllers\Frontend\Dashboard\About\AboutHeroSection;
use App\Http\Controllers\Frontend\Dashboard\About\AboutTestimonySectionController;
use App\Http\Controllers\Frontend\Dashboard\HomeDashboardController;
use App\Http\Controllers\Frontend\Dashboard\HomeEasySectionBackupController;
use App\Http\Controllers\Frontend\Dashboard\HomeHeroSectionController;
use App\Http\Controllers\Frontend\Dashboard\Product\ProductController as ProductProductController;
use App\Http\Controllers\Frontend\Dashboard\ProductWebsiteController;
use App\Http\Controllers\Frontend\Web\FEAboutController;
use App\Http\Controllers\Frontend\Web\FEBlogController;
use App\Http\Controllers\Frontend\Web\FEContactController;
use App\Http\Controllers\Frontend\Web\FEHomeController;
use App\Http\Controllers\Frontend\Web\FEProductController;
use App\Models\Dashboard\About\AboutTeamsSection;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Frontend Website
Route::get('/',[FEHomeController::class, 'index'])->name('fe.home');
Route::get('/about',[FEAboutController::class, 'index'])->name('fe.about');
Route::get('/products',[FEProductController::class, 'index'])->name('fe.products');
Route::get('/blog',[FEBlogController::class, 'index'])->name('fe.blog');
Route::get('/web/contact', [FEContactController::class, 'index'])->name('frontend.contact');
  

Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth'], 'as' => 'dashboard.'], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('product_website', ProductController::class);
    Route::resource('contact', ContactController::class );
    
    // Home Component CRUD Route Ressources
    Route::resource('web-home-dashboard', HomeDashboardController::class);
    Route::resource('home-hero-section', HomeHeroSectionController::class);
    Route::resource('home-easy-section', HomeEasySectionBackupController::class);

    

    // About Component CRUD Route Resources
    Route::resource('about_company_section', AboutCompanySectionController::class);
    Route::resource('about_hero_section', AboutHeroSection::class);
    Route::resource('about_team', AboutTeamSectionController::class);
    Route::resource('about_testimoni_section', AboutTestimonySectionController::class);
    Route::resource('product_web', ProductWebsiteController::class);
});


Route::get('/management', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/botman', [BotmanController::class, 'handle']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.home');



