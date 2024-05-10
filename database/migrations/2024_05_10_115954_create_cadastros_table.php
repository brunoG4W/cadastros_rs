<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cadastros', function (Blueprint $table) {
            $table->id();

            $table->string('tipo')->nullable();// adulto criança

            $table->string('nome')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('nome_mae')->nullable();
            $table->string('data_nascimento')->nullable();

            $table->string('local_albergue')->nullable();
            $table->string('telefone_contato')->nullable();
            $table->string('endereco')->nullable();
            $table->string('escolaridade')->nullable();
            $table->string('profissao')->nullable();
            $table->string('local_batismo')->nullable();         

            //referentes a crianças
            $table->string('cidade')->nullable();         
            $table->string('pais')->nullable();         
            $table->string('parentes')->nullable();         
            $table->string('professores')->nullable();   
            //
            $table->string('possui_abrigo_familiares')->nullable();   
            $table->string('possui_acesso_agua')->nullable();   
            $table->string('possui_filhos')->nullable();   
            $table->string('possui_familiar_desaparecido')->nullable();   
            $table->string('possui_animal_desaparecido')->nullable();   

            $table->string('comorbidades')->nullable();   
            $table->string('medicamentos')->nullable();   
            $table->string('diagnosticos_recentes')->nullable();   
            $table->string('transtornos_psiquiatricos')->nullable();   
            $table->string('trauma')->nullable();   
            $table->string('ferimentos')->nullable();   

            $table->text('necessidades')->nullable();   

            $table->integer('cadastrado_por')->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastros');
    }
};
