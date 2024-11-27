<?php

use App\Http\Controllers\ElectionController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/election_monitoring', [ElectionController::class, 'view'])->name('election.view');
Route::get('/admin/election_monitoring', [ElectionController::class, 'create'])->name('election.create');
Route::post('/admin/election_monitoring', [ElectionController::class, 'store'])->name('election.store');
