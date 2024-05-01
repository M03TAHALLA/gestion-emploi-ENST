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
        Schema::create('filliere', function (Blueprint $table) {
            $table->id();
            $table->string('NomFilliere');
            $table->string('NomChefFilliere');
            $table->foreignId('idDepartement')->constrained('departement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filliere');
    }
};
