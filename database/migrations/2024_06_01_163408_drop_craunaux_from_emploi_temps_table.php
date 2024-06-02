<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCraunauxFromEmploiTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emploi_temps', function (Blueprint $table) {
            $table->dropColumn('crenau_debut');
            $table->dropColumn('crenau_fin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emploi_temps', function (Blueprint $table) {
            $table->time('crenau_debut');
            $table->time('crenau_fin');
        });
    }
}
