<?php

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/players', function () {
    return Player::all();
});

Route::post('/players', function (Request $request) {
    $data = $request->validate([
        'nickname' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'score' => 'required|integer|min:0',
        'coaturl' => 'required|url',
    ]);
    return Player::create($data);
});
