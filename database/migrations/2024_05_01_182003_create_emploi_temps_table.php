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
        Schema::create('emploi_temps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idFilliere')->constrained('filliere');
            $table->foreignId('idEnseignant')->constrained('enseignant');
            $table->foreignId('idMatiere')->constrained('matiere');
            $table->foreignId('idSalle')->constrained('salle');
            $table->string('Jour');
            $table->time('HeurDebut');
            $table->time('HeurFin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploi_temps');
    }
};
