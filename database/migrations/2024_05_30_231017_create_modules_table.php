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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('nom_module');
            $table->unsignedBigInteger('id_filiere');
            $table->integer('volume_horaire');
            $table->enum('nature_module', ['Disciplinaire', 'Complémentaire']);
            $table->string('cin_enseignant');
            $table->string('aac')->default("24-25");
            $table->timestamps();
            $table->foreign('id_filiere')->references('id')->on('filieres')->onDelete('cascade');
            $table->foreign('cin_enseignant')->references('cin_enseignant')->on('enseignants')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
