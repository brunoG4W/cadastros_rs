<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CadastranteResource\Pages;
use App\Filament\Resources\CadastranteResource\RelationManagers;
use App\Models\Cadastrante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CadastranteResource extends Resource
{
    protected static ?string $model = Cadastrante::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                ->label('Nome')
                ->maxLength(255),

                Forms\Components\TextInput::make('cpf')
                    ->label('CPF')
                    ->mask('999.999.999-99')
                    ->maxLength(255),

                Forms\Components\TextInput::make('rg')
                    ->label('RG')                    
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('Email')                    
                    ->email()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cpf')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rg')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCadastrantes::route('/'),
            'create' => Pages\CreateCadastrante::route('/create'),
            'edit' => Pages\EditCadastrante::route('/{record}/edit'),            
        ];
    }
}
