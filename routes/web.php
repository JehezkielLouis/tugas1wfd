<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;
// Resource routes for EventCategories and Events
// Custom route for master view
Route::get('/events/master', [EventController::class, 'master_index'])->name('events.master_index');
// Route for showing details of a specific event
Route::get('/events/master/{id}', [EventController::class, 'master_show'])->name('events.master_show');

// Resource routes for EventCategories and Events
Route::resource('organizers', OrganizerController::class);
Route::resource('event_categories', EventCategoryController::class);
Route::resource('events', EventController::class);

// Adjusting the default route to load the events index for public views
Route::get('/', [EventController::class, 'index']);



