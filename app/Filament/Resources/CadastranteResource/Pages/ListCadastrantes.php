<?php

namespace App\Filament\Resources\CadastranteResource\Pages;

use App\Filament\Resources\CadastranteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCadastrantes extends ListRecords
{
    protected static string $resource = CadastranteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
