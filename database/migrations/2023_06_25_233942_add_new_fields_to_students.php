<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('street_number', 10)->nullable();    // numero
            $table->string('neighborhood', 75)->nullable();     // colonia
            $table->string('between_streets', 200)->nullable(); // entre calles
            $table->string('zip', 10)->nullable();              // codigo postal
            $table->string('city', 100)->nullable();            // ciudad
            $table->string('state', 100)->nullable();           // estado
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('street_number');    // numero
            $table->dropColumn('neighborhood');     // colonia
            $table->dropColumn('between_streets');  // entre calles
            $table->dropColumn('zip');              // codigo postal
            $table->dropColumn('city');             // ciudad
            $table->dropColumn('state');            // estado
        });
    }
}
