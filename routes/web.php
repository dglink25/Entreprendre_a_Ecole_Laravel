<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\ProjetController;

// Routes publiques
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/annonces', function () {
    return view('annonces_valide');
})->name('annonces');

Route::get('/annonces_plus', function () {
    return view('annonces_plus');
})->name('annonces_plus');

Route::get('/galeries', function () {
    return view('album');
})->name('galeries');

Route::get('/sous_album', function () {
    return view('sous-album');
})->name('sous_album');

Route::get('/sous-album_sous', function () {
    return view('sous-album_sous');
})->name('sous-album_sous');

Route::get('/contacts', function () {
    return view('contact');
})->name('contacts');

// Route entreprise publique (séparée de l'admin)
Route::get('/entreprises', [EntrepriseController::class, 'publicIndex'])->name('entreprises.public');
Route::get('/entreprises/{entreprise}', [EntrepriseController::class, 'show'])->name('entreprises.show');

// Dashboard et authentification
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('partenaires', PartenaireController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // MODULE EAE
    Route::get('/module', [ModuleController::class, 'show'])->name('module.show');
    Route::get('/module/edit', [ModuleController::class, 'edit'])->name('module.edit');
    Route::put('/module/update', [ModuleController::class, 'update'])->name('module.update');
    Route::delete('/module/delete', [ModuleController::class, 'destroy'])->name('module.delete');

    // DOMAINES (resource avec toutes les routes CRUD)
    Route::resource('domaines', DomaineController::class);

    // PROJETS (resource avec toutes les routes CRUD)
    Route::resource('projets', ProjetController::class);

    // ENTREPRISES (admin seulement)
    Route::prefix('admin')->group(function () {
        Route::get('/entreprises', [EntrepriseController::class, 'index'])->name('entreprises.index');
        Route::get('/entreprises/create', [EntrepriseController::class, 'create'])->name('entreprises.create');
        Route::post('/entreprises', [EntrepriseController::class, 'store'])->name('entreprises.store');
        Route::get('/entreprises/{entreprise}/edit', [EntrepriseController::class, 'edit'])->name('entreprises.edit');
        Route::put('/entreprises/{entreprise}', [EntrepriseController::class, 'update'])->name('entreprises.update');
        Route::delete('/entreprises/{entreprise}', [EntrepriseController::class, 'destroy'])->name('entreprises.destroy');
    });
});

require __DIR__.'/auth.php';