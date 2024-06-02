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
            $table->id();
            $table->string('nom_filiere');
            $table->string('nom_departement');
            $table->string('cordinateur');
            $table->integer('semestre');
            $table->integer('groupe');
            $table->boolean('liste_etudiant')->default(0);
            $table->string('aac')->default('24-25');
            $table->timestamps();
            $table->foreign('nom_departement')->references('nom_departement')->on('departements')->onDelete('cascade')->onUpdate('cascade');
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
