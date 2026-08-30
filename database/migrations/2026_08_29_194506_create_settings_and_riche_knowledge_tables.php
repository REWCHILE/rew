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
        // 1. Tabla de Parámetros Generales y SMTP
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
            $table->string('group')->default('general'); // general, email, smtp, notifications
            $table->timestamps();
        });

        // 2. Base de Conocimiento y Entrenamiento para Rich-E
        Schema::create('riche_knowledge_bases', function (Blueprint $table) {
            $table->id();
            $table->string('question_or_topic');
            $table->longText('answer_or_content');
            $table->string('category')->default('Servicios'); // Servicios, Precios, Tiempos, Políticas, Empresa
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riche_knowledge_bases');
        Schema::dropIfExists('settings');
    }
};
