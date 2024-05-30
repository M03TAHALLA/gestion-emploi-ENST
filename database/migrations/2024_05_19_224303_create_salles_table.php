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
        $table->string('num_salle')->primary();
        $table->string('nom_departement');
        $table->enum('type_salle', ['Salle', 'Amphi', 'Laboratoire']);
        $table->integer('capacite');
        $table->boolean('disponibilite');
        $table->string('aac')->default('24-25');
        $table->timestamps();
        $table->foreign('nom_departement')->references('nom_departement')->on('departements')->onDelete('cascade');

    });
}

public function down()
{
    Schema::dropIfExists('salles');
}
};
