<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('national_id', 18)->unique()->nullable(true);    //CURP
            $table->string('enrollment');   // Matrícula
            $table->string('admission_no', 20); // Número de admisión (registro en línea)
            $table->date('admission_date'); // Fecha de admisión (registro en línea)
            $table->string('first_name', 25);
            $table->string('middle_name', 25)->nullable(true);
            $table->string('paternal_surname', 25)->nullable(true);
            $table->string('maternal_surname', 25)->nullable(true);
            $table->date('birth_date');
            $table->integer('age')->nullable(true);
            $table->string('occupation', 100)->nullable(true);
            $table->string('personal_email')->unique();
            $table->string('home_phone', 10)->nullable(true);
            $table->string('personal_phone',10);
            $table->string('nationality', 25);
            $table->enum('marital_status', ['married', 'single', 'divorced', 'widowed'])->nullable(true);
            $table->enum('sex', ['male', 'female']);
            //$table->string('gender', ['heterosexual', 'homosexual', 'bisexual', 'lesbian', 'pansexual', 'other', 'not specific'])->nullable(true);
            $table->string('religion', 20);
            // Parents
            $table->string('father_name', 100)->nullable(true);
            $table->string('father_phone', 10)->nullable(true);
            $table->string('father_profession', 50)->nullable(true);
            $table->string('mother_name', 100)->nullable(true);
            $table->string('mother_phone', 10)->nullable(true);
            $table->string('mother_profession', 50)->nullable(true);
            // Health and other info
            $table->string('blood_group', 3)->nullable(true);
            $table->string('allergies', 100)->nullable(true);
            $table->string('ailments', 100)->nullable(true);    // Padecimientos
            $table->text('other_info')->nullable(true);
            $table->text('health_condition')->nullable(true);
            $table->timestamps();

            // Foreign key
            $table->foreignId('school_id')->constrained();
            $table->foreignId('user_id')->unique()->constrained();
            $table->foreignId('convention_id')->constrained();
            $table->foreignId('guardian_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
