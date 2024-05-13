<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Pages\BasePage;
use Filament\Pages\Concerns\InteractsWithFormActions;
use App\Filament\Resources\CadastranteResource;
use App\Models\Cadastrante;
use Filament\Notifications\Notification;

class Teste extends BasePage implements HasForms
{

    use InteractsWithForms;
    use InteractsWithFormActions;
    
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Novo Cadastrante';

    protected static string $view = 'filament.pages.teste';


    public function hasLogo(){
        return true;
    }


    public function mount(): void
    {
        $this->form->fill();
    }
    
    public function create()
    {
        Cadastrante::create($this->form->getState());

        // Notification::make()
        // ->title('')
        //     ->icon('heroicon-o-document-text')
        //     ->iconColor('success')
        //     ->send();
        
        return redirect('/')->with('status', 'Cadastrante salvo com sucesso');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome')
                ->label('Nome')
                ->maxLength(255),
                TextInput::make('cpf')
                    ->label('CPF')
                    ->mask('999.999.999-99')
                    ->maxLength(255),
                TextInput::make('rg')
                    ->label('RG')                    
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email')                    
                    // ->email()
                    ->maxLength(255),
            ])
            ->statePath('data');
    }
}
