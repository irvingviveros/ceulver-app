<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('national_id', 18)->unique()->nullable(true);  //CURP
            $table->string('responsibility', 100);  // Materia por impartir
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email',50);
            $table->string('phone',10);
            $table->string('address',250)->nullable(true);
            $table->string('blood_group', 4)->nullable(true);
            $table->date('birthday');
            $table->date('joining_date');
            $table->date('resign_date')->nullable(true);
            $table->string('photo', 100)->nullable(true);
            $table->string('resume', 100)->nullable(true);
            $table->string('linkedin_url', 255)->nullable(true);
            $table->text('other_info')->nullable(true);
            $table->tinyInteger('status');
            $table->integer('created_by');
            $table->integer('modified_by');
            $table->timestamps();

            // Foreign key
            $table->foreignId('school_id')->references('id')->on('schools');
            $table->foreignId('user_id')->unique()->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
