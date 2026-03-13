<?php

use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\AuthController;
use App\Models\Contact;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Ambil semua data slider dari database
    $sliders = \App\Models\Slider::all();
    return view('home', compact('sliders'));
});
Route::get('/company-overview', function() {
    $page = Page::where('slug', 'company-overview')->firstOrFail();
    return view('about', compact('page'));
});
Route::get('/what-we-do', function() {
    $page = Page::where('slug', 'what-we-do')->firstOrFail();
    // Ambil data service untuk grid
    $services = \App\Models\Service::orderBy('order_number', 'asc')->get();
    
    return view('what-we-do', compact('page', 'services'));
});
Route::get('/timor-leste', function() {
    $page = Page::where('slug', 'timor-leste')->firstOrFail();
    return view('timor-leste', compact('page'));
});
Route::get('/contacts', function() {
    // Ambil data kontak pertama (karena kita hanya butuh 1 baris pengaturan)
    $contact = Contact::first();
        
    // Jika tidak ada data sama sekali (lupa jalankan seeder), buat data kosong
    if (!$contact) {
        $contact = Contact::create([]); 
    }

    return view('contacts', compact('contact'));
});
Route::post('/contacts/send', [MessageController::class, 'sendMessage']);
Route::prefix('admin')->group(function(){
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    Route::middleware('auth')->group(function () {
    
        // Halaman Dashboard AdminLTE
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });
        Route::get('/sliders', [App\Http\Controllers\Admin\SliderController::class, 'index']);
        Route::post('/sliders', [App\Http\Controllers\Admin\SliderController::class, 'store']);
        // Tambahkan 2 baris ini:
        Route::get('/sliders/{id}/edit', [App\Http\Controllers\Admin\SliderController::class, 'edit']);
        Route::put('/sliders/{id}', [App\Http\Controllers\Admin\SliderController::class, 'update']);
        // --------------------
        Route::delete('/sliders/{id}', [App\Http\Controllers\Admin\SliderController::class, 'destroy']);

        // Rute untuk CMS Pages
        Route::get('/pages/{slug}', [App\Http\Controllers\Admin\PageController::class, 'edit']);
        Route::put('/pages/{slug}', [App\Http\Controllers\Admin\PageController::class, 'update']);
        // Tambahkan di bawah route put('/pages/{slug}')
        Route::delete('/pages/gallery/{id}', [App\Http\Controllers\Admin\PageController::class, 'deleteGallery']);

        Route::get('/services', [App\Http\Controllers\Admin\ServiceController::class, 'index']);
        Route::post('/services', [App\Http\Controllers\Admin\ServiceController::class, 'store']);
        Route::get('/services/{id}/edit', [App\Http\Controllers\Admin\ServiceController::class, 'edit']);
        Route::put('/services/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'update']);
        Route::delete('/services/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'destroy']);

        Route::get('/contacts', [App\Http\Controllers\Admin\ContactController::class, 'index']);
        Route::post('/contacts', [App\Http\Controllers\Admin\ContactController::class, 'update']);

        Route::get('/messages', [App\Http\Controllers\Admin\MessageController::class, 'index']);
        Route::get('/messages/{id}', [App\Http\Controllers\Admin\MessageController::class, 'show']);
        Route::delete('/messages/{id}', [App\Http\Controllers\Admin\MessageController::class, 'destroy']);

        // Proses Logout (AdminLTE menggunakan method POST untuk keamanan)
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});