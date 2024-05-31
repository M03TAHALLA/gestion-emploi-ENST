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
            $table->string('nom_departement');
            $table->unsignedBigInteger('id_filiere');
            $table->string('semestre');
            $table->integer('groupe');
            $table->string('crenau_debut');
            $table->dateTime('crenau_fin');
            $table->string('aac')->default('24-25');
            $table->timestamps();

            $table->foreign('nom_departement')->references('nom_departement')->on('departements')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_filiere')->references('id')->on('filieres')->onDelete('cascade')->onUpdate('cascade');
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
