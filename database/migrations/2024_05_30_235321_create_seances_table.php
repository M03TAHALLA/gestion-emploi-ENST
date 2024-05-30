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
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->string('nom_filiere');
            $table->string('semestre');
            $table->string('nom_groupe');
            $table->unsignedBigInteger('id_module');
            $table->string('jour');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->string('num_salle');
            $table->string('cin_enseignant');

            $table->timestamps();
            $table->foreign('nom_filiere')->references('nom_filiere')->on('filieres')->onDelete('cascade');
            $table->foreign('cin_enseignant')->references('cin_enseignant')->on('enseignants')->onDelete('cascade');
            $table->foreign('id_module')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('num_salle')->references('num_salle')->on('salles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seances');
    }
};
