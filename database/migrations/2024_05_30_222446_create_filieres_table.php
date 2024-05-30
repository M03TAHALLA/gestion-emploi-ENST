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
        Schema::create('filieres', function (Blueprint $table) {
            $table->string('nom_filiere')->primary();
            $table->string('nom_departement');
            $table->string('cordinateur');
            $table->integer('semestre');
            $table->boolean('liste_etudiant');
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
        Schema::dropIfExists('filieres');
    }
};
