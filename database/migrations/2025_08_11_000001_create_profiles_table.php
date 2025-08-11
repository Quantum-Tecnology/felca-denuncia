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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')
                ->unique()
                ->comment('Nome do perfil');
            $table->string('url')
                ->comment('URL do perfil');
            $table->string('description')
                ->nullable()
                ->comment('Descrição do perfil');
            $table->string('image')
                ->nullable()
                ->comment('Imagem do perfil');
            $table->unsignedInteger('searched')
                ->default(0)
                ->comment('Quantidade de vezes que o perfil foi pesquisado');
            $table->timestamp('last_searched_at')
                ->nullable()
                ->comment('Data da última pesquisa');
            $table->unsignedInteger('denounced')
                ->default(0)
                ->comment('Quantidade de vezes que o perfil foi denunciado');
            $table->timestamp('last_denounced_at')
                ->nullable()
                ->comment('Data da última denúncia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
