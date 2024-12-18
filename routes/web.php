<?php

use App\Http\Controllers\PurchasedTicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QrScannerController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\testcontroller;
use App\Http\Controllers\TicketConfirmationController;
use App\Models\PurchasedTicket;

//pages
Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/jadwal', [PagesController::class, 'jadwal']);

//auth
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::get('/users', [ManagementController::class, 'indexUser'])->name('management.users.index');
    Route::get('/users/create', [ManagementController::class, 'createUser'])->name('management.users.create');
    Route::post('/users/store', [ManagementController::class, 'storeUser'])->name('management.users.store');
    Route::get('/users/edit/{id}', [ManagementController::class, 'editUser'])->name('management.users.edit');
    Route::post('/users/update/{id}', [ManagementController::class, 'updateUser'])->name('management.users.update');
    Route::delete('/users/delete/{id}', [ManagementController::class, 'deleteUser'])->name('management.users.delete');

    // Roles routes
    Route::get('/roles', [ManagementController::class, 'indexRole'])->name('management.roles.index');
    Route::get('/roles/create', [ManagementController::class, 'createRole'])->name('management.roles.create');
    Route::post('/roles/store', [ManagementController::class, 'storeRole'])->name('management.roles.store');
    Route::get('/roles/{id}/edit', [ManagementController::class, 'editRole'])->name('management.roles.edit');
    Route::post('/roles/{id}/update', [ManagementController::class, 'updateRole'])->name('management.roles.update');
    Route::delete('/roles/{id}', [ManagementController::class, 'deleteRole'])->name('management.roles.delete');

    // Menus routes
    Route::get('/menus', [ManagementController::class, 'indexMenu'])->name('management.menus.index');
    Route::get('/menus/create', [ManagementController::class, 'createMenu'])->name('management.menus.create');
    Route::post('/menus/store', [ManagementController::class, 'storeMenu'])->name('management.menus.store');
    Route::get('/menus/edit/{id}', [ManagementController::class, 'editmenu'])->name('management.menus.edit');
    Route::post('/menus/{id}/update', [ManagementController::class, 'updatemenu'])->name('management.menus.update');
    Route::delete('/menus/{id}', [ManagementController::class, 'deletemenu'])->name('management.menus.delete');

    // Submenu route
    Route::get('/submenus', [ManagementController::class, 'indexsubMenu'])->name('management.submenus.index');
    Route::get('/submenus/create', [ManagementController::class, 'createsubMenu'])->name('management.submenus.create');
    Route::post('/submenus/store', [ManagementController::class, 'storesubMenu'])->name('management.submenus.store');
    Route::get('/submenus/edit/{id}', [ManagementController::class, 'editsubmenu'])->name('management.submenus.edit');
    Route::post('/submenus/{id}/update', [ManagementController::class, 'updatesubmenu'])->name('management.submenus.update');
    Route::delete('/submenus/{id}', [ManagementController::class, 'deletesubmenu'])->name('management.submenus.delete');

    //setting
    Route::get('/settings', [ManagementController::class, 'indexsetting'])->name('management.settings.index');
    Route::get('/settings/create', [ManagementController::class, 'createsetting'])->name('management.settings.create');
    Route::post('/settings/store', [ManagementController::class, 'storesetting'])->name('management.settings.store');
    Route::delete('/settings/{id}', [ManagementController::class, 'deletesetting'])->name('management.settings.delete');

    //content

    Route::get('pesan', [PesanController::class, 'index'])->name('pesan.index');
    Route::resource('tikets', ContentController::class);
    Route::resource('jadwals', JadwalController::class);

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); // Halaman keranjang// Rute ke halaman detail tiket
    Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');
    
    // Rute untuk menambah tiket ke keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    // Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update'); // Update jumlah
    // Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove'); // Hapus item

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
    
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/{transaksi}', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::get('/checkout/{transaksi}/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/{transaksi}/failed', [CheckoutController::class, 'failed'])->name('checkout.failed');


    Route::get('/tickets', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/purchased-tickets', [PurchasedTicketController::class, 'index'])->name('purchased-tickets.index');
    Route::get('/purchased-tickets/{id}/download', [PurchasedTicketController::class, 'download'])->name('purchased-tickets.download');
    // Route::get('/transactions', [TransactionController::class, 'index'])->name("transactions");

    //posts
    // Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    // Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like');
    // Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    // // routes/web.php
    // Route::post('/download-stock', [AuthController::class, 'downloadStock'])->name('download.stock');

    // Route::resource('content', ContentController::class);

});

Route::get('/ticket/confirm/{ticket}', [TicketConfirmationController::class, 'show'])->name('ticket.confirm');
Route::post('/ticket/confirm/{ticket}', [TicketConfirmationController::class, 'confirm'])->name('ticket.confirm.post');

