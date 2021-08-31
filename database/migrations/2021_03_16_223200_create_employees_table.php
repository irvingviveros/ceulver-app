<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('national_id', 18)->nullable(true);
            $table->string('first_name',100)->nullable(true);
            $table->string('last_name',100)->nullable(true);
            $table->string('email',50)->nullable(true);
            $table->string('phone',10)->nullable(true);
            $table->string('address',255)->nullable(true);
            $table->string('gender',20)->nullable(true);
            $table->string('blood_group',15)->nullable(true);
            $table->date('birthday')->nullable(true);
            $table->date('joining_date')->nullable(true);
            $table->date('resign_date')->nullable(true);
            $table->string('photo', 100)->nullable(true);
            $table->string('resume',100)->nullable(true);
            $table->text('other_info')->nullable(true);
            $table->tinyInteger('status');
            $table->integer('created_by');
            $table->integer('modified_by');
            $table->timestamps();

            // Foreign key
            $table->foreignId('school_id')->constrained();
            $table->foreignId('designation_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
