<?php

use App\Livewire\Admin\PharmacyComponent;
use App\Livewire\Admin\TurnComponent;
use Illuminate\Support\Facades\Route;


Route::get('/', PharmacyComponent::class)->name('admin.pharmacies');
Route::get('/turnos', TurnComponent::class)->name('admin.turns');