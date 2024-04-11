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
        
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome',80)->nullable(false);
            $table->string('telefone',11)->nullable(false);
            $table->text('endereco',70)->nullable(false);
            $table->text('email')->nullable(false);
            $table->string('cpf',11)->nullable(false);
            $table->text('password')->nullable(false);
            $table->string('imagem')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
