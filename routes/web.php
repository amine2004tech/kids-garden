<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Letter;
use App\Models\Number;
use App\Models\Color;

// API route for checking authentication status
Route::get('/api/check-auth', function () {
    return response()->json([
        'authenticated' => auth()->check(),
        'is_admin' => auth()->check() ? auth()->user()->isAdmin() : false
    ]);
});

// API route for getting CSRF token
Route::get('/api/csrf-token', function () {
    return response()->json([
        'token' => csrf_token()
    ]);
});

// Public routes
Route::get('/', function () {
    return file_get_contents(public_path('pages/home.html'));
});

// Authentication Routes
Route::get('/login', function () {
    return file_get_contents(public_path('pages/login.html'));
})->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', function () {
    return file_get_contents(public_path('pages/register.html'));
})->name('register');

Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/lessons', function () {
        return file_get_contents(public_path('pages/lessons.html'));
    });

    Route::get('/games', function () {
        return file_get_contents(public_path('pages/games.html'));
    });
});

// Public routes
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// Admin routes
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/content', [AdminController::class, 'content']);
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::post('/admin/make-admin/{user}', [AdminController::class, 'makeAdmin']);
    Route::post('/admin/remove-admin/{user}', [AdminController::class, 'removeAdmin']);
    Route::post('/admin/add-letter', [AdminController::class, 'addLetter']);
    Route::delete('/admin/delete-letter/{id}', [AdminController::class, 'deleteLetter']);
    Route::post('/admin/add-number', [AdminController::class, 'addNumber']);
    Route::delete('/admin/delete-number/{id}', [AdminController::class, 'deleteNumber']);
    Route::post('/admin/add-color', [AdminController::class, 'addColor']);
    Route::delete('/admin/delete-color/{id}', [AdminController::class, 'deleteColor']);
    Route::get('/ggez', function () {
        $lessons = \App\Models\Lesson::all();
        return view('admin.lessons.index', ['lessons' => $lessons]);
    })->name('lessons.index');
    Route::get('/ggez/create', [App\Http\Controllers\LessonController::class, 'create'])->name('lessons.create');
    Route::post('/ggez', [App\Http\Controllers\LessonController::class, 'store'])->name('lessons.store');
    Route::get('/ggez/{lesson}/edit', [App\Http\Controllers\LessonController::class, 'edit'])->name('lessons.edit');
    Route::put('/ggez/{lesson}', [App\Http\Controllers\LessonController::class, 'update'])->name('lessons.update');
    Route::delete('/ggez/{lesson}', [App\Http\Controllers\LessonController::class, 'destroy'])->name('lessons.destroy');
    Route::get('/ggezzz', function () {
        $letters = \App\Models\Letter::all();
        $numbers = \App\Models\Number::all();
        $colors = \App\Models\Color::all();
        return view('admin.ggezzz', [
            'letters' => $letters,
            'numbers' => $numbers,
            'colors' => $colors
        ]);
    })->name('ggezzz');
});

// API routes
Route::get('/api/letters', function () {
    return response()->json(Letter::all());
});

Route::get('/api/numbers', function () {
    return response()->json(Number::all());
});

Route::get('/api/colors', function () {
    return response()->json(Color::all());
});

// Temporary route to create admin user
Route::get('/create-admin', function () {
    $user = \App\Models\User::create([
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => \Illuminate\Support\Facades\Hash::make('password'),
        'is_admin' => true,
    ]);
    return 'Admin user created!';
});

// Admin ggez route
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->get('/ggez', function () {
    return response('gg you are admin', 200)->header('Content-Type', 'text/plain');
});

// Catch-all route for frontend routing - must be last
Route::get('/{any}', function () {
    return File::get(public_path('pages/home.html'));
})->where('any', '^(?!login|register|password|email|admin).*$');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
