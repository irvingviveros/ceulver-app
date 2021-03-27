<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CareerSchool extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Pivot table careers - schools
        Schema::create('career_school', function (Blueprint $table) {
            $table->foreignId('career_id')->constrained();
            $table->foreignId('school_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('career_school', function (Blueprint $table) {
            //
        });
    }
}
