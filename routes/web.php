<?php

use App\Filament\Pages\Teste;
use Illuminate\Support\Facades\Route;
use App\Filament\Pages\PublicCadastro;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/cadastrante', Teste::class)->name('teste');
Route::get('/cadastro', PublicCadastro::class)->name('public-cadastro');