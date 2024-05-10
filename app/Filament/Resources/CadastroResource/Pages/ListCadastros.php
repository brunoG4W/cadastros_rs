<?php

namespace App\Filament\Resources\CadastroResource\Pages;

use App\Filament\Resources\CadastroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

use Illuminate\Database\Eloquent\Builder;

class ListCadastros extends ListRecords
{
    protected static string $resource = CadastroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Todos' => Tab::make(),
            'Adultos' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('tipo', 'adulto')),
            'Crianças' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('tipo', 'crianca')),
        ];
    }
}
