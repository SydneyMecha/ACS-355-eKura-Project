<?php

use App\Http\Controllers\BallotController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ElectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing_page/about', function () {
    return view('landing_page.about');
});

Route::get('/landing_page/contact', function () {
    return view('landing_page.contact');
});

Route::get('/landing_page/price', function () {
    return view('landing_page.price');
});

Route::get('/landing_page/product_details', function () {
    return view('landing_page.product_details');
});

Route::get('/landing_page/service', function () {
    return view('landing_page.service');
});

Route::get('/landing_page/shop', function () {
    return view('landing_page.shop');
});

//Route::get('/admin/dashboard', [ElectionController::class, 'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Election Routes
Route::resource('elections', ElectionController::class);
Route::put('elections/{election}', [ElectionController::class, 'update'])->name('elections.update');
Route::delete('elections/{election}', [ElectionController::class, 'destroy'])->name('elections.destroy');

// Ballot Routes - These can be handled by the ElectionController, so no need to nest BallotController.
Route::post('/ballots', [BallotController::class, 'storeBallot'])->name('ballots.store');
Route::put('ballots/{ballot}', [BallotController::class, 'update'])->name('ballots.update');
Route::delete('ballots/{ballot}', [BallotController::class, 'destroy'])->name('ballots.destroy');

Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');
Route::put('candidates/{candidate}', [CandidateController::class, 'update'])->name('candidates.update');
Route::delete('candidates/{candidate}', [CandidateController::class, 'destroy'])->name('candidates.destroy');

Route::get('/admin/election_monitoring', [ElectionController::class, 'showElectionMonitoringPage']);

Route::get('/admin/charts', function () {
    return view('admin.charts');
});


Route::get('/admin/voter_management', function () {
    return view('admin.voter_management');
});

Route::get('/profile/edit', function () {
    return view('profile.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/api/elections', [ElectionController::class, 'getElections'])->name('api.elections');

Route::get('/ballots/{id}/candidates', [BallotController::class, 'getCandidates']);
Route::get('/elections/{election}/candidates', [ElectionController::class, 'getCandidates']);


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
