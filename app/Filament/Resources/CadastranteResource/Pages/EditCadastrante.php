<?php

namespace App\Filament\Resources\CadastranteResource\Pages;

use App\Filament\Resources\CadastranteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCadastrante extends EditRecord
{
    protected static string $resource = CadastranteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
