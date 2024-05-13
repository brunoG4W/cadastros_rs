<?php

namespace App\Filament\Resources\CadastranteResource\Pages;

use App\Filament\Resources\CadastranteResource;
use Filament\Resources\Pages\Page;

class CustomPageCadastrante extends Page
{
    protected static string $resource = CadastranteResource::class;

    protected static string $view = 'filament.resources.cadastrante-resource.pages.custom-page-cadastrante';
}
