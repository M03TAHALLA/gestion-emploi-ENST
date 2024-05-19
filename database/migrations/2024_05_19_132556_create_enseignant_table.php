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
        Schema::create('enseignant', function (Blueprint $table) {
            $table->id();
            $table->string('CIN');
            $table->string('NomEnseignant');
            $table->string('PrenomEnseignant');
            $table->string('Email');
            $table->string('Specialite');
            $table->integer('NomDepartement');
            $table->date('DateNaissance');
            $table->integer('HoraireTotalParModule')->value(null);
            $table->date('DateAffectation');
            $table->string('Situation');
            $table->string('AAc')->value('24-25');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignant');
    }
};
