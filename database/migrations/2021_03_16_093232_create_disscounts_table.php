<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disscounts', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('discount_type', 50);
            $table->double('amount', 10,2);
            $table->text('note')->nullable(true);
            $table->tinyInteger('status');
            $table->integer('created_by');
            $table->integer('modified_by');
            $table->timestamps();

            // Foreign key
            $table->foreignId('school_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disscounts');
    }
}
