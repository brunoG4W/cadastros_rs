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
        Schema::create('cadastrantes', function (Blueprint $table) {
            $table->id();

            $table->string('nome')->nullable();
            $table->string('email')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();

            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastrantes');
    }
};
