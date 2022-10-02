<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Support\Enums\GenderEnum;
use Support\Enums\MaritalStatusEnum;

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
            $table->string('enrollment')->nullable(true); // Matrícula
            $table->string('admission_no', 20)->nullable(true); // Número de admisión (registro en línea)
            $table->date('admission_date')->nullable(true); // Fecha de admisión (registro en línea)
            $table->string('payment_reference')->nullable(true); // Referencia de pago
            $table->string('first_name', 35);  // Nombre(s)
            $table->string('paternal_surname', 25)->nullable(true); // Apellido paterno
            $table->string('maternal_surname', 25)->nullable(true); // Apellido materno
            $table->date('birth_date'); // Fecha cumpleaños
            $table->integer('age')->nullable(true); // Edad //TODO: calcular automáticamente edad en base a birth_date
            $table->string('occupation', 100)->nullable(true); // Ocupación
            $table->string('address')->nullable(true); // Dirección
            $table->string('personal_email')->unique()->nullable(true); // Correo personal
            $table->string('home_phone', 10)->nullable(true); // Teléfono de casa
            $table->string('personal_phone', 17)->nullable(true); // Teléfono personal
            $table->string('nationality', 25)->default('Mexicano'); // Nacionalidad
            $table->string('marital_status')->nullable(true)->default('No especifica'); //Estado civil
            $table->string('sex', 20)->nullable(true); // SexEnum, Sexo
            // Health and other info
            $table->string('blood_group', 15)->nullable(true); // Grupo de sangre
            $table->string('allergies', 100)->nullable(true); // Alergias
            $table->string('ailments', 100)->nullable(true); // Padecimientos
            $table->text('other_info')->nullable(true); // Otra información, notas
            $table->text('health_condition')->nullable(true); // Condición de salud
            $table->timestamps();

            // Foreign key
            $table->foreignId('school_id')->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('scholarship_id')->nullable(true)->constrained();
            $table->foreignId('guardian_id')->nullable(true)->constrained();
            $table->foreignId('career_id')->nullable(true)->constrained();
            $table->tinyInteger('status')->default(1); // 1 = active, 0 = inactive
            $table->integer('created_by');
            $table->integer('modified_by')->nullable(true);
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
