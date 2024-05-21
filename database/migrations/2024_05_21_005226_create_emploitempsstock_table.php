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
        Schema::create('emploitempsstock', function (Blueprint $table) {
            $table->id();
            $table->string('NomModule');
            $table->string('Jour');
            $table->time('HeurDebut');
            $table->time('HeurFin');
            $table->integer('NumSalle');
            $table->string('NomEnseignant');
            $table->string('PrenomEnseignant');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploitempsstock');
    }
};
