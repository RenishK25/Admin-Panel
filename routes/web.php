<?php

use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\admin\LoginController::class, 'index']);

// Route::get('/login', [\App\Http\Controllers\admin\LoginController::class,'index']);
// Route::get("login",[App\Http\Controllers\UserController::class,'index']);
// Route::post("login",[App\Http\Controllers\UserController::class,'login']);


Route::get("login",[App\Http\Controllers\UserController::class,'index']);
// Route::post("login_form",[App\Http\Controllers\UserController::class,'login']);


Route::prefix('admin')->group(function () {

Route::get('/', [\App\Http\Controllers\admin\LoginController::class, 'index']);
Route::get('/login', [\App\Http\Controllers\admin\LoginController::class, 'index']);
Route::post('/login', [\App\Http\Controllers\admin\LoginController::class, 'login']);
Route::get('/logout', [\App\Http\Controllers\admin\LoginController::class, 'logout'])->middleware('AdminAuth');

Route::middleware([AdminAuth::class])->group(function(){

    // Route::prefix('dashboard')->group(function () {

        // Route::get('/index', [App\Http\Controllers\admin\HomeController::class, 'index']);
        Route::resource('dashboard', App\Http\Controllers\admin\HomeController::class);
        Route::post('/dashboard/activity_history', [App\Http\Controllers\admin\HomeController::class, 'show']);
        Route::post('/dashboard/activity_history/datatable', [App\Http\Controllers\admin\HomeController::class, 'datatable']);

    // });

    Route::get('/index', [App\Http\Controllers\admin\CategoryController::class, 'index']);
    Route::post('/subcategory_select', [App\Http\Controllers\admin\HomeController::class, 'subcategory']);
    
    Route::prefix('category')->group(function () {    
        Route::get('/index', [App\Http\Controllers\admin\CategoryController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\admin\CategoryController::class, 'create']);
        Route::post('/add', [App\Http\Controllers\admin\CategoryController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\admin\CategoryController::class, 'edit']);
        Route::post('/edit', [App\Http\Controllers\admin\CategoryController::class, 'update']);
        Route::post('/delete', [App\Http\Controllers\admin\CategoryController::class, 'destroy']);
        Route::post('/datatable', [App\Http\Controllers\admin\CategoryController::class, 'datatable']);
    });
    Route::prefix('subcategory')->group(function () {
        Route::get('/index', [App\Http\Controllers\admin\SubcategoryController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\admin\SubcategoryController::class, 'create']);
        Route::post('/add', [App\Http\Controllers\admin\SubcategoryController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\admin\SubcategoryController::class, 'edit']);
        Route::post('/edit', [App\Http\Controllers\admin\SubcategoryController::class, 'update']);
        Route::post('/delete', [App\Http\Controllers\admin\SubcategoryController::class, 'destroy']);
        Route::post('/datatable', [App\Http\Controllers\admin\SubcategoryController::class, 'datatable']);
    });

    Route::post('/color/name_color_change', [App\Http\Controllers\admin\ColorController::class, 'name_color_change']);
    Route::post('/color/datatable', [App\Http\Controllers\admin\ColorController::class, 'datatable']);
    Route::resource('color', App\Http\Controllers\admin\ColorController::class);


    Route::post('/size/name_size_change', [App\Http\Controllers\admin\SizeController::class, 'name_size_change']);
    Route::post('/size/datatable', [App\Http\Controllers\admin\SizeController::class, 'datatable']);
    Route::post('/size/product', [App\Http\Controllers\admin\SizeController::class, 'product']);
    Route::resource('size', App\Http\Controllers\admin\SizeController::class);

    Route::post('/product_brand/datatable', [App\Http\Controllers\admin\ProductBrandController::class, 'datatable']);
    Route::resource('product_brand', App\Http\Controllers\admin\ProductBrandController::class);

    Route::post('/product_dimension/datatable', [App\Http\Controllers\admin\ProductDimensionController::class, 'datatable']);
    Route::post('/product_dimension/product', [App\Http\Controllers\admin\ProductDimensionController::class, 'product']);
    Route::resource('product_dimension', App\Http\Controllers\admin\ProductDimensionController::class);

    Route::post('/product_weight/datatable', [App\Http\Controllers\admin\ProductWeightController::class, 'datatable']);
    Route::post('/product_weight/product', [App\Http\Controllers\admin\ProductWeightController::class, 'product']);
    Route::resource('product_weight', App\Http\Controllers\admin\ProductWeightController::class);

    Route::post('/product_material/datatable', [App\Http\Controllers\admin\ProductMaterialController::class, 'datatable']);
    Route::post('/product_material/product', [App\Http\Controllers\admin\ProductMaterialController::class, 'product']);
    Route::resource('product_material', App\Http\Controllers\admin\ProductMaterialController::class);

    Route::post('/product_special_feature/datatable', [App\Http\Controllers\admin\ProductSpecialFeatureController::class, 'datatable']);
    Route::post('/product_special_feature/product', [App\Http\Controllers\admin\ProductSpecialFeatureController::class, 'product']);
    Route::resource('product_special_feature', App\Http\Controllers\admin\ProductSpecialFeatureController::class);

    Route::post('/product/datatable', [App\Http\Controllers\admin\ProductController::class, 'datatable']);
    Route::get('/product/add2', [App\Http\Controllers\admin\ProductController::class, 'create2']);
    Route::get('/product/psc', [App\Http\Controllers\admin\ProductController::class, 'psc']);
    Route::post('/product/psc', [App\Http\Controllers\admin\ProductController::class, 'psc_store']);
    // Route::get('/product/detail', [App\Http\Controllers\admin\ProductController::class, 'detail']);
    // Route::post('/product/detail', [App\Http\Controllers\admin\ProductController::class, 'detail_store']);
    Route::post('/product/color_size_name_get', [App\Http\Controllers\admin\ProductController::class, 'color_size_name_get']);
    Route::post('/product/product', [App\Http\Controllers\admin\ProductController::class, 'product']);
    Route::get('/product/edit2/{id}', [App\Http\Controllers\admin\ProductController::class, 'edit2']);
    Route::post('/product/product_update', [App\Http\Controllers\admin\ProductController::class, 'product_update']);
    Route::post('/product/size_color', [App\Http\Controllers\admin\ProductController::class, 'size_color']);
    Route::post('/product/is_available', [App\Http\Controllers\admin\ProductController::class, 'is_available']);
    Route::post('/product/detail', [App\Http\Controllers\admin\ProductController::class, 'detail']);
    Route::resource('product', App\Http\Controllers\admin\ProductController::class);

    Route::post('/product_image/datatable', [App\Http\Controllers\admin\ProductImageController::class, 'datatable']);
    Route::resource('product_image', App\Http\Controllers\admin\ProductImageController::class);
    
    });
});