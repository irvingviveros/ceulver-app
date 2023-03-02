<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_receipts', function (Blueprint $table) {
            $table->id();
            $table->string('sheet_acronym')->nullable();
            $table->integer('sheet_id')->unique();
            $table->string('full_name')->nullable();
            // Foreign id
            $table->foreignId('student_id')->nullable();
            $table->foreignId('school_id');
            $table->foreignId('receipt_id')->constrained();
            $table->integer('created_by');
            $table->integer('modified_by')->nullable();
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
        Schema::table('other_receipts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('other_receipts');
    }
}
