<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100);
            $table->string('last_name', 100);
            $table->date('birthday');
            $table->string('national_id', 18);
            $table->string('gender', 20);
            $table->string('occupation', 60)->nullable(true);
            $table->string('blood_group', 5)->nullable(true);
            $table->string('allergies', 50)->nullable(true);
            $table->string('any_condition', 50)->nullable(true);
            $table->string('phone', 10)->nullable(true);
            $table->string('email',60)->nullable(true);
            $table->string('photo', 120)->nullable(true);
            $table->string('state', 40);
            $table->string('city', 60);
            $table->string('address', 255);
            $table->string('zip_code', 10);
            $table->string('marital_status', 15)->nullable(true);
            $table->string('is_guardian', 50)->nullable(true);
            $table->string('gud_relation',100)->nullable(true);
            $table->string('gud_name', 100)->nullable(true);
            $table->string('gud_phone', 10)->nullable(true);
            $table->string('gud_email', 60)->nullable(true);
            $table->string('gud_other_info', 255)->nullable(true);
            $table->string('father_name', 100)->nullable(true);
            $table->string('father_phone', 10)->nullable(true);
            $table->string('mother_name', 100)->nullable(true);
            $table->string('mother_phone', 10)->nullable(true);
            $table->string('previous_school',255)->nullable(true);
            $table->string('previous_career',100)->nullable(true);
            $table->tinyInteger('status');
            $table->integer('created_by');
            $table->integer('modified_by');

            $table->timestamps();

            // Foreign key
            $table->foreignId('class_id')->references('id')->on('classes');
            $table->foreignId('career_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('student_type_id')->constrained();
            $table->foreignId('guardian_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions');
    }
}
