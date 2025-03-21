<?php

use App\Livewire\HomePage;
use App\Livewire\LoginPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;
use App\Livewire\SobreNostrosPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);

Route::get('/sobre-nosotros', SobreNostrosPage::class);

Route::get('/product-detail-page/{slug}',ProductDetailPage::class);

Route::get('/products-page',ProductsPage::class);


Route::get('/login',LoginPage::class);

Route::get('/mis-pedidos',MyOrdersPage::class);


