<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyllabiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syllabi', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('note')->nullable(true);
            // Foreign key
            $table->foreignId('school_id')->constrained();
            $table->foreignId('career_id')->nullable(true);

            $table->integer('created_by');
            $table->integer('modified_by');
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
        Schema::dropIfExists('syllabi');
    }
}
