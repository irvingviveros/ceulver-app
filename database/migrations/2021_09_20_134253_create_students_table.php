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
            $table->string('national_id', 18)->unique()->nullable(true); //CURP
            $table->string('enrollment'); // Matrícula
            $table->string('admission_no', 20); // Número de admisión (registro en línea)
            $table->date('admission_date'); // Fecha de admisión (registro en línea)
            $table->string('first_name', 25);  // Primer nombre
            $table->string('middle_name', 25)->nullable(true); // Segundo nombre
            $table->string('paternal_surname', 25)->nullable(true); // Apellido paterno
            $table->string('maternal_surname', 25)->nullable(true); // Apellido materno
            $table->date('birth_date'); // Fecha cumpleaños
            $table->integer('age')->nullable(true); // Edad //TODO: calcular automáticamente edad en base a birth_date
            $table->string('occupation', 100)->nullable(true); // Ocupación
            $table->string('personal_email')->unique(); // Correo personal
            $table->string('home_phone', 10)->nullable(true); // Teléfono de casa
            $table->string('personal_phone', 10); // Teléfono personal
            $table->string('nationality', 25)->default('Mexicano'); // Nacionalidad
            $table->enum('marital_status', ['married', 'single', 'divorced', 'widowed'])->nullable(true)->default('single'); //Estado civil
            $table->enum('sex', ['male', 'female']); // Sexo
            $table->string('gender', ['heterosexual', 'homosexual', 'bisexual', 'lesbian', 'pansexual', 'other', 'not specific'])->nullable(true); // Género
            $table->string('religion', 20); // Religión
            // Parents
            $table->string('father_name', 100)->nullable(true); // Nombre del padre
            $table->string('father_phone', 10)->nullable(true); // Teléfono
            $table->string('father_profession', 50)->nullable(true); // Profesión
            $table->string('mother_name', 100)->nullable(true); // Nombre de la madre
            $table->string('mother_phone', 10)->nullable(true); // Teléfono
            $table->string('mother_profession', 50)->nullable(true); // Profesión
            // Health and other info
            $table->string('blood_group', 3)->nullable(true); // Grupo de sangre
            $table->string('allergies', 100)->nullable(true); // Alergias
            $table->string('ailments', 100)->nullable(true); // Padecimientos
            $table->text('other_info')->nullable(true); // Otra información, notas
            $table->text('health_condition')->nullable(true); // Condición de salud
            $table->timestamps();

            // Foreign key
            $table->foreignId('school_id')->constrained();
            $table->foreignId('user_id')->unique()->constrained();
            $table->foreignId('agreement_id')->constrained();
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
