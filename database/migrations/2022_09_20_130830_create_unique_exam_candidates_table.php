<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniqueExamCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unique_exam_candidates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 25)->nullable(false);
            $table->string('paternal_surname', 25)->nullable();
            $table->string('maternal_surname', 25)->nullable();
            $table->string('rubric')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unique_exam_candidates');
    }
}
