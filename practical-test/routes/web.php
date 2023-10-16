<?php

use App\Http\Controllers\ContactPersonController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CustomerController::class, 'showForm'])->name('showForm');
Route::get('/add-contact-person', [ContactPersonController::class, 'showSecondForm'])->name('showSecondForm');
Route::get('/list', [ListController::class, 'showList'])->name('showList');
Route::get('/edit/{id}', [ListController::class, 'editContactPerson'])->name('editContactPerson');

Route::post('/submitCustomer', [CustomerController::class, 'submitCustomer'])->name('submitCustomer');
Route::post('/submitContactPerson', [ContactPersonController::class, 'submitContactPerson'])->name('submitContactPerson');

Route::delete('/delete/{id}', [ListController::class, 'deleteContactPerson'])->name('deleteContactPerson');

Route::put('/update-contact-person/{id}', [ListController::class, 'updateContactPerson'])->name('updateContactPerson');
