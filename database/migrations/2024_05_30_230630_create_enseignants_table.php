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
        Schema::create('enseignants', function (Blueprint $table) {
            $table->string('cin_enseignant')->primary();
            $table->string('nom_enseignant');
            $table->string('prenom_enseignant');
            $table->string('email');
            $table->string('specialite');
            $table->string('nom_departement');
            $table->date('date_naissance');
            $table->integer('horaire_total');
            $table->date('date_affectation');
            $table->enum('situation', ['Vacataire', 'Permanant']);
            $table->string('aac')->default('24-25');
            $table->timestamps();

            $table->foreign('nom_departement')->references('nom_departement')->on('departements')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignants');
    }
};
