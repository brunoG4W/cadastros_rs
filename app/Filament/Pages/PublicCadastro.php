<?php

namespace App\Filament\Pages;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Pages\BasePage;
use Filament\Pages\Concerns\InteractsWithFormActions;
use App\Filament\Resources\CadastranteResource;
use App\Models\Cadastrante;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use App\Models\Cadastro;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\CheckboxList;
use Illuminate\Validation\ValidationException;

class PublicCadastro extends BasePage implements HasForms
{

    use InteractsWithForms;
    use InteractsWithFormActions;
    
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Novo Cadastro';

    protected static string $view = 'filament.pages.cadastro';


    public function hasLogo(){
        return true;
    }


    // public function mount(): void
    // {
    //     $this->form->fill();
    // }


    
    public function create()
    {
        try {
            Cadastro::create($this->form->getState());
        } catch (\Throwable $th) {
            dd($this->form->getState());
        }
        
         return redirect('/')->with('status', 'Cadastro salvo com sucesso');
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([

                Select::make('cadastrado_por')
                    ->label('Cadastrante')
                    ->required()
                    ->options(Cadastrante::all()->pluck('nome', 'id')),
                    // ->searchable(),

                Select::make('tipo')
                    ->label('Idade')
                    ->required()
                    ->options([
                        'adulto' => 'Adulto',
                        'crianca' => 'Criança',                    
                    ]),

                Select::make('sexo')
                    ->label('Sexo')
                    ->required()
                    ->options([
                        'masculino' => 'Masculino',
                        'feminino' => 'Feminino',                    
                        'outros' => 'Outros',                    
                    ]),

                TextInput::make('nome')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),

                TextInput::make('cpf')
                    ->label('CPF')
                    ->mask('999.999.999-99')
                    ->maxLength(255),

                TextInput::make('rg')
                    ->label('RG')                    
                    ->maxLength(255),

                TextInput::make('nome_mae')
                    ->label('Nome da mãe')
                    ->maxLength(255),

                TextInput::make('data_nascimento')
                    ->label('Data Nascimento')
                    ->mask('99/99/9999')
                    ->maxLength(255),

                TextInput::make('local_albergue')
                    ->label('Local do Albergue')
                    ->maxLength(255),

                TextInput::make('telefone_contato')
                    ->label('Telefone Contato')                    
                    ->maxLength(255),

                TextInput::make('endereco')
                    ->label('Endereço')                   
                    ->maxLength(255),
                 TextInput::make('cidade')
                    ->label('Cidade')  
                    ->datalist([
                        'Canas',
                        'Porto Alegre',
                    ])
                    ->maxLength(255),

                Select::make('escolaridade')
                    ->label('Escolaridade')       
                    ->options([
                        'fundadmental' => 'Ensino Fundamental',
                        'medio' => 'Ensino Medio',
                        'superior' => 'Ensino Superior',
                        'fundadmental_incompleto' => 'Ensino Fundamental Incompleto',
                        'medio_incompleto' => 'Ensino Medio Incompleto',
                        'superior_incompleto' => 'Ensino Superior Incompleto',                        
                    ]),        

                TextInput::make('profissao')
                    ->label('Profissao')  
                    ->maxLength(255),

                TextInput::make('local_batismo')
                    ->label('Local de Batismo')  
                    ->maxLength(255),


                // caso crinaças
                TextInput::make('pais')
                    ->label('Nome dos pais')
                    ->maxLength(255),
                TextInput::make('parentes')
                    ->label('Nome parentes contato')
                    ->maxLength(255),
                TextInput::make('professores')
                    ->label('Nome professores contato')
                    ->maxLength(255),
                // caso crinaças

                Radio::make('possui_abrigo_familiares')
                    ->label('Possui Abrigo com familiares?')
                    ->inline()
                    ->inlineLabel(false)
                    ->options([
                        'sim' => 'Sim',
                        'nao' => 'Não',                        
                    ]),

                Radio::make('possui_acesso_agua')
                    ->label('Possui acesso água potável?')
                    ->inline()
                    ->inlineLabel(false)
                    ->options([
                        'sim' => 'Sim',
                        'nao' => 'Não',                        
                    ]),

                Radio::make('possui_filhos')
                    ->inline()
                    ->inlineLabel(false)
                    ->options([
                        'sim' => 'Sim',
                        'nao' => 'Não',                        
                    ]),
                TextInput::make('nome_filhos')
                    ->label('Nome filhos')
                    ->maxLength(255),



                TextInput::make('possui_familiar_desaparecido')
                    ->label('Familiar desaparecido')
                    ->maxLength(255),


                TextInput::make('possui_animal_desaparecido')
                    ->label('Animal desaparecido')
                    ->maxLength(255),

                TextInput::make('comorbidades')
                    ->label('Comorbidades')
                    ->columnSpanFull()
                    ->maxLength(255),

                TextInput::make('medicamentos')
                    ->label('Medicamentos uso contínuo')
                    ->columnSpanFull()
                    ->maxLength(255),

                TextInput::make('diagnosticos_recentes')
                    ->label('Diagnósticos recentes')
                    ->columnSpanFull()
                    ->maxLength(255),

                TextInput::make('transtornos_psiquiatricos')
                    ->label('Transtornos Psiquiátricos')
                    ->columnSpanFull()
                    ->maxLength(255),

                TextInput::make('trauma')
                    ->label('Traumas')
                    ->columnSpanFull()
                    ->maxLength(255),
                TextInput::make('ferimentos')
                    ->label('Ferimentos')
                    ->columnSpanFull()
                    ->maxLength(255),

                CheckboxList::make('necessidades')
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
}
