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
        Schema::create('etudiant', function (Blueprint $table) {
            $table->id();
            $table->string('CIN');
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('NomDepartement');
            $table->string('NomFilliere');
            $table->integer('SemestreActuelle');
            $table->string('Email');
            $table->string('AAc')->value('24-25');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiant');
    }
};
