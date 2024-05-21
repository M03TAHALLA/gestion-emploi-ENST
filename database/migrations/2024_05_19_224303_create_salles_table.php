<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('salles', function (Blueprint $table) {
        $table->id();
        $table->string('num_salle')->unique();
        $table->string('nom_departement');
        $table->enum('type_salle', ['Salle', 'Amphi', 'Laboratoire']);
        $table->integer('capacite');
        $table->boolean('disponibilite');
        $table->string('AAc')->default('24-25');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('salles');
}
};
