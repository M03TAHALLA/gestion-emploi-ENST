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
<<<<<<< HEAD
        $table->foreign('nom_departement')->references('nom_departement')->on('departements')->onDelete('cascade')->onUpdate('cascade');

=======
        $table->foreign('nom_departement')->references('nom_departement')->on('departements')->onDelete('cascade');
>>>>>>> 89077b7b81ead95e6cb2f3ec23c27b1232f0a9a8
    });
}

public function down()
{
    Schema::dropIfExists('salles');
}
};
