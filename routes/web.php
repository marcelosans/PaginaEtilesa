<?php

use App\Livewire\ForgotPasswordPage;
use App\Livewire\HomePage;
use App\Livewire\LoginPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;
use App\Livewire\RegisterPage;
use App\Livewire\ResetPasswordPage;
use App\Livewire\SobreNostrosPage;
use App\Livewire\CartPage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\CheckoutPage;
use App\Livewire\SuccessPage;
use App\Livewire\MyOrderDetailPage;
use App\Livewire\Profile;

Route::get('/', HomePage::class);
Route::get('/sobre-nosotros', SobreNostrosPage::class);
Route::get('/product-detail-page/{slug}',ProductDetailPage::class);
Route::get('/products-page',ProductsPage::class);
Route::get('/carrito',CartPage::class);



Route::middleware('guest')->group(function(){
    Route::get('/login',LoginPage::class)->name('login');
    Route::get('/forgot-page',ForgotPasswordPage::class)->name('password.request');
    Route::get('/register',RegisterPage::class);
    Route::get('/reset-password/{token}',ResetPasswordPage::class)->name('password.reset');
    
});

Route::middleware('auth')->group(function(){
    Route::get('/logout',function(){
         Auth::logout();
         return redirect('/');
     });
    Route::get('/success',SuccessPage::class)->name('success');
    Route::get('/checkout',CheckoutPage::class);
    Route::get('/my-orders',MyOrdersPage::class);
    Route::get('/profile',Profile::class);
    Route::get('/my-order-detail/{order_id}',MyOrderDetailPage::class)->name('my-orders.show');
});


