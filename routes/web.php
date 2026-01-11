<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\ProjetController;

/*
|--------------------------------------------------------------------------
| Routes Publiques (Sans Authentification)
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Annonces
Route::get('/annonces', function () {
    return view('annonces_valide');
})->name('annonces');

Route::get('/annonces_plus', function () {
    return view('annonces_plus');
})->name('annonces_plus');

// Entreprises
Route::get('/entreprises', function () {
    return view('Entreprise_Cree');
})->name('entreprises');

Route::get('/entreprises_lirePlus', function () {
    return view('entreprisecree_LirePlus');
})->name('entreprises_lirePlus');

// Galeries
Route::get('/galeries', function () {
    return view('album');
})->name('galeries');

Route::get('/sous_album', function () {
    return view('sous-album');
})->name('sous_album');

Route::get('/sous-album_sous', function () {
    return view('sous-album_sous');
})->name('sous-album_sous');

// Partenaires
Route::get('/partenaires', function () {
    return view('partenaires');
})->name('partenaires');

// Contacts
Route::get('/contacts', function () {
    return view('contact');
})->name('contacts');

/*
|--------------------------------------------------------------------------
| Programme EaE - NOUVELLES ROUTES
|--------------------------------------------------------------------------
*/

// Page principale Programme EaE (Landing)
Route::get('/programme-eae', function () {
    return view('programmeEaE');
})->name('programme.eae');

// 1. ENTREPRISES ALUMNI
Route::get('/programme-eae/entreprises-alumni', function () {
    return view('entreprises_alumni');
})->name('programme.entreprises.alumni');

// 2. ENTREPRISES INCUBÉES
Route::get('/programme-eae/entreprises-incubees', function () {
    return view('entreprises_incubees');
})->name('programme.entreprises.incubees');

// 3. ENTREPRISES ACTIVITÉS
Route::get('/programme-eae/entreprises-activites', function () {
    return view('entreprises_activites');
})->name('programme.entreprises.activites');

// Sous-pages Programme EaE (si besoin)
Route::get('/programme-eae/presentation', function () {
    return view('programmeEaE');
})->name('programme.presentation');

Route::get('/programme-eae/activites', function () {
    return view('programmeEaE');
})->name('programme.activites');

/*
|--------------------------------------------------------------------------
| Dashboard & Authentification
|--------------------------------------------------------------------------
*/

// Dashboard (nécessite authentification)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Routes avec Authentification
|--------------------------------------------------------------------------
*/

// Profile utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Administration (nécessite authentification)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    
    // MODULE EaE
    Route::prefix('module')->group(function () {
        Route::get('/', [ModuleController::class, 'show'])->name('module.show');
        Route::get('/edit', [ModuleController::class, 'edit'])->name('module.edit');
        Route::put('/update', [ModuleController::class, 'update'])->name('module.update');
        Route::delete('/delete', [ModuleController::class, 'destroy'])->name('module.delete');
    });

    // DOMAINES (CRUD complet)
    Route::resource('domaines', DomaineController::class)->names([
        'index' => 'domaines.index',
        'create' => 'domaines.create',
        'store' => 'domaines.store',
        'show' => 'domaines.show',
        'edit' => 'domaines.edit',
        'update' => 'domaines.update',
        'destroy' => 'domaines.destroy'
    ]);

    // PROJETS (CRUD complet)
    Route::resource('projets', ProjetController::class)->names([
        'index' => 'projets.index',
        'create' => 'projets.create',
        'store' => 'projets.store',
        'show' => 'projets.show',
        'edit' => 'projets.edit',
        'update' => 'projets.update',
        'destroy' => 'projets.destroy'
    ]);
    
    // Ajoutez ici d'autres routes d'administration si nécessaire
});

/*
|--------------------------------------------------------------------------
| Authentification Laravel Breeze (généré automatiquement)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';