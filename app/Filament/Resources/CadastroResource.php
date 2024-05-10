<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CadastroResource\Pages;
use App\Filament\Resources\CadastroResource\RelationManagers;
use App\Models\Cadastro;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class CadastroResource extends Resource
{
    protected static ?string $model = Cadastro::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('type')
                    ->label('Idade')
                    ->options([
                        'adulto' => 'Adulto',
                        'crianca' => 'Criança',                    
                    ]),

                Forms\Components\Select::make('type')
                    ->label('Sexo')
                    ->options([
                        'masculino' => 'Masculino',
                        'feminino' => 'Feminino',                    
                        'outros' => 'Outros',                    
                    ]),

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

                Forms\Components\TextInput::make('nome_mae')
                    ->label('Nome da mãe')
                    ->maxLength(255),

                Forms\Components\TextInput::make('data_nascimento')
                    ->label('Data Nascimento')
                    ->mask('99/99/9999')
                    ->maxLength(255),

                Forms\Components\TextInput::make('local_albergue')
                    ->label('Local do Albergue')
                    ->maxLength(255),

                Forms\Components\TextInput::make('telefone_contato')
                    ->label('Telefone Contato')                    
                    ->maxLength(255),

                Forms\Components\TextInput::make('endereco')
                    ->label('Endereço')                   
                    ->maxLength(255),
                 Forms\Components\TextInput::make('cidade')
                    ->label('Cidade')  
                    ->datalist([
                        'Canas',
                        'Porto Alegre',
                    ])
                    ->maxLength(255),

                Forms\Components\TextInput::make('pais')
                    ->label('País')  
                    ->autocomplete('Brasil')
                    ->maxLength(255),

                Forms\Components\Select::make('escolaridade')
                    ->label('Escolaridade')       
                    ->options([
                        'fundadmental' => 'Ensino Fundamental',
                        'medio' => 'Ensino Medio',
                        'superior' => 'Ensino Superior',
                        'fundadmental_incompleto' => 'Ensino Fundamental Incompleto',
                        'medio_incompleto' => 'Ensino Medio Incompleto',
                        'superior_incompleto' => 'Ensino Superior Incompleto',                        
                    ]),        

                Forms\Components\TextInput::make('profissao')
                    ->label('Profissao')  
                    ->maxLength(255),

                Forms\Components\TextInput::make('local_batismo')
                    ->label('Local de Batismo')  
                    ->maxLength(255),


                // caso crinaças
                Forms\Components\TextInput::make('parentes')
                    ->label('Nome Pais')
                    ->maxLength(255),
                Forms\Components\TextInput::make('parentes')
                    ->label('Nome Parentes Contato')
                    ->maxLength(255),
                Forms\Components\TextInput::make('professores')
                    ->label('Nome Professores Contato')
                    ->maxLength(255),
                // caso crinaças



                Forms\Components\Radio::make('possui_abrigo_familiares')
                    ->label('Possui Abrigo com familiares?')
                    ->inline()
                    ->inlineLabel(false)
                    ->options([
                        'sim' => 'Sim',
                        'nao' => 'Não',                        
                    ]),

                Forms\Components\Radio::make('possui_acesso_agua')
                    ->label('Possui acesso água potável?')
                    ->inline()
                    ->inlineLabel(false)
                    ->options([
                        'sim' => 'Sim',
                        'nao' => 'Não',                        
                    ]),

                Forms\Components\Radio::make('possui_filhos')
                    ->inline()
                    ->inlineLabel(false)
                    ->options([
                        'sim' => 'Sim',
                        'nao' => 'Não',                        
                    ]),
                Forms\Components\TextInput::make('nome_filhos')
                    ->label('Nome filhos')
                    ->maxLength(255),



                Forms\Components\TextInput::make('possui_familiar_desaparecido')
                    ->label('Familiar desaparecido')
                    ->maxLength(255),


                Forms\Components\TextInput::make('possui_animal_desaparecido')
                    ->label('Animal desaparecido')
                    ->maxLength(255),

                Forms\Components\TextInput::make('comorbidades')
                    ->label('Comorbidades')
                    ->columnSpanFull()
                    ->maxLength(255),

                Forms\Components\TextInput::make('medicamentos')
                    ->label('Medicamentos uso contínuo')
                    ->columnSpanFull()
                    ->maxLength(255),

                Forms\Components\TextInput::make('diagnosticos_recentes')
                    ->label('Diagnósticos recentes')
                    ->columnSpanFull()
                    ->maxLength(255),

                Forms\Components\TextInput::make('transtornos_psiquiatricos')
                    ->label('Transtornos Psiquiátricos')
                    ->columnSpanFull()
                    ->maxLength(255),

                Forms\Components\TextInput::make('trauma')
                    ->label('Traumas')
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ferimentos')
                    ->label('Ferimentos')
                    ->columnSpanFull()
                    ->maxLength(255),

                Forms\Components\CheckboxList::make('necessidades')
                    ->label('Necessita de:')
                    ->options([
                        'alimentacao' => 'Alimentação ',
                        'mamadeira' => 'Mamadeiras',
                        'fralda' => 'Fraldas',
                        'escova_dente' => 'Escova de dentes',
                        'roupas' => 'Roupas',
                        'produtos_limpeza' => 'Produtos de limpeza ',
                        'produtos_higiene' => 'Produtos de higiene',                 
                    ])
                    ->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cpf')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rg')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome_mae')
                    ->searchable(),
                Tables\Columns\TextColumn::make('data_nascimento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('local_albergue')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefone_contato')
                    ->searchable(),
                Tables\Columns\TextColumn::make('endereco')
                    ->searchable(),
                Tables\Columns\TextColumn::make('escolaridade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('profissao')
                    ->searchable(),
                Tables\Columns\TextColumn::make('local_batismo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cidade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pais')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parentes')
                    ->searchable(),
                Tables\Columns\TextColumn::make('professores')
                    ->searchable(),
                Tables\Columns\TextColumn::make('possui_abrigo_familiares')
                    ->searchable(),
                Tables\Columns\TextColumn::make('possui_acesso_agua')
                    ->searchable(),
                Tables\Columns\TextColumn::make('possui_filhos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('possui_familiar_desaparecido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('possui_animal_desaparecido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('comorbidades')
                    ->searchable(),
                Tables\Columns\TextColumn::make('medicamentos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('diagnosticos_recentes')
                    ->searchable(),
                Tables\Columns\TextColumn::make('transtornos_psiquiatricos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('trauma')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ferimentos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cadastrado_por')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListCadastros::route('/'),
            'create' => Pages\CreateCadastro::route('/create'),
            'edit' => Pages\EditCadastro::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
