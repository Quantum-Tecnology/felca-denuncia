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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreign('profile_id')
                ->constrained('profiles')
                ->onDelete('cascade')
                ->comment('ID do perfil relacionado à denúncia');
            $table->string('reason')
                ->comment('Motivo da denúncia')
                ->default('inappropriate_content');
            $table->text('details')
                ->nullable()
                ->comment('Detalhes adicionais sobre a denúncia');
            $table->string('status')
                ->default('pending')
                ->comment('Status da denúncia (pending, processed, rejected)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
