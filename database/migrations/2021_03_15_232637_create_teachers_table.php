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
            $table->string('rfc', 13)->unique()->nullable(true); //RFC
            $table->string('responsibility', 100);  // Materia por impartir
            $table->string('enrollment')->nullable(true); //Matrícula
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable(true);
            $table->string('paternal_surname', 50);
            $table->string('maternal_surname', 50)->nullable(true);
            $table->string('email',50)->nullable(true);
            $table->string('phone',10)->nullable(true);
            $table->string('address',250)->nullable(true);
            $table->string('blood_group', 14)->nullable(true);
            $table->date('birth_date')->nullable(true);
            $table->date('joining_date')->nullable(true);
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
            $table->foreignId('school_id')->constrained();
            $table->foreignId('user_id')->unique()->constrained();
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
