<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/annonces', function () {
    return view('annonces_valide'); // Correspond à resources/views/annonces_valide.blade.php
})->name('annonces');

Route::get('/annonces_plus', function () {
    return view('annonces_plus'); // Correspond à resources/views/annonces_plus.blade.php
})->name('annonces_plus');

Route::get('/entreprises', function () {
    return view('Entreprise_Cree'); // Correspond à resources/views/entreprise_Cree.blade.php
})->name('entreprises');

Route::get('/entreprises_lirePlus', function () {
    return view('entreprisecree_LirePlus'); // Correspond à resources/views/Entreprisecree_LirePlus.blade.php
})->name('entreprises_lirePlus');

Route::get('/galeries', function () {
    return view('album'); // Correspond à resources/views/album.blade.php
})->name('galeries');

Route::get('/sous_album', function () {
    return view('sous-album'); // Correspond à resources/views/sous-album.blade.php
})->name('sous_album');

Route::get('/sous-album_sous', function () {
    return view('sous-album_sous'); // Correspond à resources/views/sous-album_sous.blade.php
})->name('sous-album_sous');

Route::get('/partenaires', function () {
    return view('index'); // Correspond à resources/views/index.blade.php
})->name('partenaires');

Route::get('/contacts', function () {
    return view('contact'); // Correspond à resources/views/contact.blade.php
})->name('contacts');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
