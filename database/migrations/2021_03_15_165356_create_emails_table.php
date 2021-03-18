<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->integer('sender_role_id');
            $table->text('receivers')->nullable(true);
            $table->string('email_type', 50);
            $table->date('absent_date')->nullable(true);
            $table->string('subject', 255);
            $table->text('body');
            $table->string('attachment',100)->nullable(true);
            $table->integer('created_by');
            $table->integer('modified_by');
            $table->timestamps();

            // Foreign key
            $table->foreignId('school_id')->references('id')->on('schools');
            $table->foreignId('role_id')->references('id')->on('roles');
            $table->foreignId('academic_year_id')->references('id')->on('academic_years');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
