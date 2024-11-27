<?php

use App\Http\Controllers\BallotController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ElectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Election Routes
Route::resource('elections', ElectionController::class);

// Ballot Routes - These can be handled by the ElectionController, so no need to nest BallotController.
Route::post('/ballots', [BallotController::class, 'storeBallot'])->name('ballots.store');
Route::put('ballots/{ballot}', [BallotController::class, 'update'])->name('ballots.update');
Route::delete('ballots/{ballot}', [BallotController::class, 'destroy'])->name('ballots.destroy');

Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');
Route::put('candidates/{candidate}', [CandidateController::class, 'update'])->name('candidates.update');
Route::delete('candidates/{candidate}', [CandidateController::class, 'destroy'])->name('candidates.destroy');

Route::get('/admin/election_monitoring', function () {
    return view('admin.election_monitoring');
});

Route::get('/admin/voter_management', function () {
    return view('admin.voter_management');
});

Route::get('/profile/edit', function () {
    return view('profile.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/api/elections', [ElectionController::class, 'getElections'])->name('api.elections');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
