<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_receipts', function (Blueprint $table) {
            $table->id();
            $table->integer('sheet_id')->unique();
            // Foreign id
            $table->foreignId('receipt_id')->constrained();
            $table->foreignId('student_id');
            $table->integer('created_by');
            $table->integer('modified_by')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_receipts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('student_receipts');
    }
}
