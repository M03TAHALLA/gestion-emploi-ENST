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
        Schema::create('emploi-temps', function (Blueprint $table) {
            $table->id();
            $table->string('NomDepartement');
            $table->string('NomFilliere');
            $table->string('NomModule');
            $table->integer('Groupe');
            $table->string('Jour');
            $table->dateTime('CraunauxDebut');
            $table->dateTime('CraunauxFin');
            $table->dateTime('HeurDebut');
            $table->dateTime('HeusFin');
            $table->integer('NumSalle');
            $table->string('TypeSalle');
            $table->string('NomEnseignant');
            $table->string('PrenomEnseignant');
            $table->string('AAc')->value('24-25');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploi-temps');
    }
};
