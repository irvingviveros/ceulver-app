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
            $table->string('street_name', 100);     // calle
            $table->string('street_number', 10);    // numero
            $table->string('neighborhood', 75);     // colonia
            $table->string('between_streets', 200); // entre calles
            $table->string('zip', 10);              // codigo postal
            $table->string('city', 100);            // ciudad
            $table->string('state', 100);           // estado
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
            $table->dropColumn('street_name');      // calle
            $table->dropColumn('street_number');    // numero
            $table->dropColumn('neighborhood');     // colonia
            $table->dropColumn('between_streets');  // entre calles
            $table->dropColumn('zip');              // codigo postal
            $table->dropColumn('city');             // ciudad
            $table->dropColumn('state');            // estado
        });
    }
}
