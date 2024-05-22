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
            $table->string('nom_filiere');
            $table->integer('volume_horaire');
            $table->enum('nature_module', ['Disciplinaire', 'Complémentaire']);
            $table->string('nom_professeur');
            $table->year('AAc')->default(2024);
            $table->timestamps();
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
