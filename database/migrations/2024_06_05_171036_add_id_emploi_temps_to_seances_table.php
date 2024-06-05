<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdEmploiTempsToSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('seances', function (Blueprint $table) {
            // Add the new column
            $table->unsignedBigInteger('id_emploi_temps')->after('id_module')->nullable();

            // Define the foreign key relationship
            $table->foreign('id_emploi_temps')->references('id')->on('emploi_temps')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('seances', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['id_emploi_temps']);

            // Then drop the column
            $table->dropColumn('id_emploi_temps');
        });
    }
}
