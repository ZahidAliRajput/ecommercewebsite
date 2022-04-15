<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Models\Role;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Route;
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

// Routes for the frontend 
Route::group(['prefix' => 'frontend'], function()
{
    Route::get('home', [HomeController::class, 'Home'])->name('home');
    Route::get('singleproduct/{slug}', [HomeController::class, 'SingleProduct'])->name('singleproduct');

//Routes Shopping cart 
    Route::get('cart', [CartController::class, 'cart'])->name('cart');
    Route::get('addtocart/{id}', [CartController::class, 'addToCart'])->name('addtocart');
    Route::patch('updatecart', [CartController::class, 'update'])->name('updatecart');
    Route::delete('removefromcart', [CartController::class, 'remove'])->name('removefromcart');

//Routes for the Wishlist Module

    Route::get('addtowishlist/{id}', [WishlistController::class, 'store'])->name('addtowishlist');
    Route::get('manage', [WishlistController::class, 'manage'])->name('showwishlist');

    Route::get('removefromwishlist/{id}', [WishlistController::class, 'RemoveFromWishList'])->name('removefromwishlist');

// Routes for the Checkout
    Route::get('checkout', [CheckoutController::class, 'CheckOut'])->name('checkout');
    Route::post('placeorder', [CheckoutController::class, 'PlaceOrder'])->name('placeorder');
    Route::get('orderitems', [CheckoutController::class, 'OrderItems'])->name('orderitems');

});


// Route::middleware('auth')->group(['prefix' => 'frontend'], function(){
//     Route::get('orderitems', [CheckoutController::class, 'OrderItems'])->name('orderitems');
// });


    Route::get('signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('postsignup', [AuthController::class, 'postsignup'])->name('postsignup');
    Route::get('/account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');   
    Route::get('signin', [AuthController::class, 'signin'])->name('signin');
    Route::post('postsignin', [AuthController::class, 'postsignin'])->name('postsignin');
    Route::get('forgetpassword', [ForgetPasswordController::class, 'forgetpassword'])->name('forgetpassword');
    Route::post('postforgetpassword', [ForgetPasswordController::class, 'postforgetpassword'])->name('postforgetpassword');
    Route::get('/resetpassword/{token}', [ForgetPasswordController::class, 'showresetpasswordform'])->name('showresetpasswordform');
    Route::post('postresetpassword', [ForgetPasswordController::class, 'postresetpassword'])->name('postresetpassword');
    Route::get('signoff', [AuthController::class, 'signoff'])->name('signoff');

Route::middleware(['auth', 'is_verify_email'])->group(function () 
{
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    //Users Routes
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('adduser', [UserController::class, 'create'])->name('adduser');
    Route::post('postuser', [UserController::class, 'store'])->name('postuser');
    Route::get('edituser/{id}', [UserController::class, 'edit'])->name('edituser');
    Route::post('updateuser', [UserController::class, 'update'])->name('updateuser');
    Route::get('deleteuser/{id}', [UserController::class, 'destroy'])->name('deleteuser');
    
    //Users Permissions Routes
    Route::get('userpermissions/{id}', [UserController::class, 'haspermissions'])->name('userpermissions');
    Route::post('userhaspermissionupdate', [UserController::class, 'haspermissionsupdate'])->name('userhaspermissionupdate');
    //Users Permissions Routes

    //User Profile
    Route::get('userprofile', [UserController::class, 'UserProfile'])->name('userprofile');
    Route::post('updateprofile', [UserController::class, 'UpdateProfile'])->name('updateprofile');
    Route::get('editpassword', [UserController::class, 'editpassword'])->name('editpassword');
    Route::post('updatepassword', [UserController::class, 'updatepassword'])->name('updatepassword');
    //User Profile

    //Users Routes Ends

    // Categories Routes
    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('storecategory', [CategoryController::class, 'store'])->name('storecategory');
    Route::get('editcategory/{id}', [CategoryController::class, 'edit'])->name('editcategory');
    Route::post('updatecategory', [CategoryController::class, 'update'])->name('updatecategory');

    // SubCategories Routes
    Route::get('managesubcategory', [SubCategoryController::class, 'index'])->name('managesubcategory');
    Route::get('addsubcategory', [SubCategoryController::class, 'create'])->name('addsubcategory');
    Route::post('postsubcategory', [SubCategoryController::class, 'store'])->name('postsubcategory');
    Route::post('updatesubcategory', [SubCategoryController::class, 'update'])->name('updatesubcategory');
    Route::get('editsubcategory/{id}', [SubCategoryController::class, 'edit'])->name('editsubcategory');
    Route::get('deletesubcategory/{id}', [SubCategoryController::class, 'destroy'])->name('deletesubcategory');
    Route::get('subcategoryshow/{id}', [ProductController::class, 'SubCategoryShow']);
    
    //Permission Routes
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::post('storepermission', [PermissionController::class, 'store'])->name('storepermission');
    Route::get('editpermission/{id}', [PermissionController::class, 'edit'])->name('editpermission');
    Route::post('updatepermission', [PermissionController::class, 'update'])->name('updatepermission');
    Route::get('deletepermission/{id}', [PermissionController::class, 'destroy'])->name('deletepermission');

    //Roles Crud
    Route::get('roles', [RoleController::class, 'index'])->name('roles');
    Route::post('storerole', [RoleController::class, 'store'])->name('storerole');
    Route::get('editrole/{id}', [RoleController::class, 'edit'])->name('editrole');
    Route::post('updaterole', [RoleController::class, 'update'])->name('updaterole');
    Route::get('deleterole/{id}', [RoleController::class, 'destroy'])->name('deleterole');
    //Role has Permissions
    Route::get('rolepermissions/{id}', [RoleController::class, 'haspermissions'])->name('rolepermissions');
    Route::post('rolehaspermissionsupdate', [RoleController::class, 'haspermissionsupdate'])->name('rolehaspermissionupdate');

    //Products Routes
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('addproduct', [ProductController::class, 'create'])->name('addproduct');
    Route::post('postproduct', [ProductController::class, 'store'])->name('postproduct');
    Route::get('editproduct/{id}', [ProductController::class, 'edit'])->name('editproduct');
    Route::post('updateproduct', [ProductController::class, 'update'])->name('updateproduct');
    Route::get('deleteproduct/{id}', [ProductController::class, 'destroy'])->name('deleteproduct');
});
