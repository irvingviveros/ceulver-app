<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToGuardians extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guardians', function (Blueprint $table) {
            $table->string('maternal_surname', 75)->nullable(); // apellido materno
            $table->string('street_number', 10)->nullable();    // numero
            $table->string('neighborhood', 75)->nullable();     // colonia
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guardians', function (Blueprint $table) {
            $table->dropColumn('maternal_surname'); // apellido materno
            $table->dropColumn('street_number');    // numero
            $table->dropColumn('neighborhood');     // colonia
        });
    }
}
