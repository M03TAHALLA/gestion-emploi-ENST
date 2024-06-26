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
        Schema::create('sous_admins', function (Blueprint $table) {
            $table->id();
            $table->string('cin')->unique();
            $table->string('matricule')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password')->nullable(); // Make sure to set it nullable for existing records
            $table->string('aac')->default('24-25');
            $table->rememberToken(); // Add remember_token for authentication
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sous_admins');
    }
};
