<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Chirp;

Route::view('/','welcome')->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    
    Route::get('/chirps', function(){
        return view('chirps.index');
    })->name('chirps.index');

    Route::post('/chirps', function(){
        //return 'Processing Chirps...';
        //return request('message');
        //$message =  request('message');
        // Insert into data base
        Chirp::create([
            //L23'message' => $message, (Simplificación)
            'message' => request('message'),
            'user_id' => auth()->id(),
        ]);

        //session()->flash('status','Chirp created successfully!');

        return to_route('chirps.index')
            ->with('status',__('Chirp created successfully!'));
    });
});

require __DIR__.'/auth.php';
